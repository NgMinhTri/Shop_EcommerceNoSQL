from datetime import datetime
from time import sleep
from uuid import uuid1, uuid4
from random import choice, randint, uniform
from cassandra.cluster import Cluster
from faker import Faker

FAKE = Faker()
TRANSPORT = []

def transport_generator(amount):
  now = datetime.now().strftime("%Y-%m-%d %H:%M:%S")

  global TRANSPORT

  for _ in range(amount):
    initial_status = choice(['Get product', 'Shipping', 'Idling'])
    is_idle = True if initial_status == 'Idling' else False
    order_amount = randint(50, 100) if not is_idle else 0

    TRANSPORT.append({
      'id': uuid1(),
      'transport_id': uuid4(),
      'status': initial_status,
      'is_idle': is_idle,
      'order_amount': order_amount,
      'order_amount_current': order_amount - randint(order_amount - 50, order_amount),
      'long': float(FAKE.latitude()),
      'lat': float(FAKE.longitude()),
      'timestamp': now,
      'is_active': True
    })

def change_transport_status():
  now = datetime.now().strftime("%Y-%m-%d %H:%M:%S")

  global TRANSPORT

  for t in TRANSPORT:
    t['lat'] += uniform(-0.5,0.5)
    t['long'] += uniform(-0.5,0.5)

    t['status'] = choice(['Get product', 'Shipping', 'Idling'])

    if t['status'] == 'Idling':
      t['is_idle'] = True


def main():

  global TRANSPORT

  initial_transports_amount = randint(100, 2000)

  print(f'Generate {initial_transports_amount} transports')


  transport_generator(initial_transports_amount)

  cluster = Cluster(['localhost'], port=9042)
  session = cluster.connect('ecommerce')

  while True:
    change_transport_status()

    for t in TRANSPORT:
      session.execute(
        """
        INSERT INTO transport_status (transport_status_id, transport_status_transport_id, transport_status_status, transport_status_is_idle, transport_status_order_amount, transport_status_order_amount_current, transport_status_long, transport_status_lat, transport_status_timestamp, transport_status_is_active)
        VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)
        """,
        (t['id'], t['transport_id'], t['status'], t['is_idle'], t['order_amount'], t['order_amount_current'], t['long'], t['lat'], t['timestamp'], t['is_active'])
      )

    sleep(1)

if __name__ == "__main__":
  main()