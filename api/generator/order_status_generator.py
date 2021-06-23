from datetime import datetime
from time import sleep
from uuid import uuid1, uuid4
from random import choice, randint
from cassandra.cluster import Cluster

PENDING_ORDER = []
PROCESSING_ORDER = []
SHIPPED_ORDER = []
COMPLETE_ORDER = []

def order_generator(amount):
  now = datetime.now().strftime("%Y-%m-%d %H:%M:%S")

  global PENDING_ORDER

  PENDING_ORDER += [
    {
      'id': uuid1(),
      'order_id': uuid4(),
      'status': 'Pending',
      'timestamp': now,
      'is_active': True
    }
    for _ in range(amount)
  ]

def change_pending_order_status():
  global PENDING_ORDER
  global PROCESSING_ORDER

  now = datetime.now().strftime("%Y-%m-%d %H:%M:%S")

  if PENDING_ORDER:
    choosen_order = choice(PENDING_ORDER)
    choosen_order['timestamp'] = now
    choosen_order['status'] = 'Processing'
    PROCESSING_ORDER.append(choosen_order)
    PENDING_ORDER.remove(choosen_order)

def change_processing_order_status():
  global PROCESSING_ORDER
  global SHIPPED_ORDER

  now = datetime.now().strftime("%Y-%m-%d %H:%M:%S")

  if PROCESSING_ORDER:
    choosen_order = choice(PROCESSING_ORDER)
    choosen_order['timestamp'] = now
    choosen_order['status'] = 'Shipped'
    SHIPPED_ORDER.append(choosen_order)
    PROCESSING_ORDER.remove(choosen_order)

def change_shipped_order_status():
  global SHIPPED_ORDER
  global COMPLETE_ORDER

  now = datetime.now().strftime("%Y-%m-%d %H:%M:%S")

  if SHIPPED_ORDER:
    choosen_order = choice(SHIPPED_ORDER)
    choosen_order['timestamp'] = now
    choosen_order['status'] = 'Complete'
    COMPLETE_ORDER.append(choosen_order)
    SHIPPED_ORDER.remove(choosen_order)

def main():
  global PENDING_ORDER
  global PROCESSING_ORDER
  global SHIPPED_ORDER
  global COMPLETE_ORDER

  while True:
    initial_orders_amount = randint(50, 100)
    order_generator(initial_orders_amount)
    print(f'Generate {initial_orders_amount} orders')

    change_pending_orders_amount = randint(0, len(PENDING_ORDER))
    for _ in range(change_pending_orders_amount):
      change_pending_order_status()
    print(f'Change {change_pending_orders_amount} pending orders')

    change_processing_orders_amount = randint(0, len(PROCESSING_ORDER))
    for _ in range(change_processing_orders_amount):
      change_processing_order_status()
    print(f'Change {change_processing_orders_amount} processing orders')

    change_shipped_orders_amount = randint(0, len(SHIPPED_ORDER))
    for _ in range(change_shipped_orders_amount):
      change_shipped_order_status()
    print(f'Change {change_shipped_orders_amount} shipped orders')

    cluster = Cluster(['localhost'], port=9042)
    session = cluster.connect('ecommerce')

    for order in PENDING_ORDER:
      session.execute(
        """
        INSERT INTO order_status (order_status_id, order_status_order_id, order_status_status, order_status_timestamp, order_status_is_active)
        VALUES (%s, %s, %s, %s, %s)
        """,
        (order['id'], order['order_id'], order['status'], order['timestamp'], order['is_active'])
      )

    for order in PROCESSING_ORDER:
      session.execute(
        """
        INSERT INTO order_status (order_status_id, order_status_order_id, order_status_status, order_status_timestamp, order_status_is_active)
        VALUES (%s, %s, %s, %s, %s)
        """,
        (order['id'], order['order_id'], order['status'], order['timestamp'], order['is_active'])
      )

    for order in SHIPPED_ORDER:
      session.execute(
        """
        INSERT INTO order_status (order_status_id, order_status_order_id, order_status_status, order_status_timestamp, order_status_is_active)
        VALUES (%s, %s, %s, %s, %s)
        """,
        (order['id'], order['order_id'], order['status'], order['timestamp'], order['is_active'])
      )

    for order in COMPLETE_ORDER:
      session.execute(
        """
        INSERT INTO order_status (order_status_id, order_status_order_id, order_status_status, order_status_timestamp, order_status_is_active)
        VALUES (%s, %s, %s, %s, %s)
        """,
        (order['id'], order['order_id'], order['status'], order['timestamp'], order['is_active'])
      )

    COMPLETE_ORDER = []

    sleep(1)

if __name__ == "__main__":
  main()