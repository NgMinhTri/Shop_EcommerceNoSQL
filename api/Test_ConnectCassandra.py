from cassandra.cluster import Cluster

def main():
  cluster = Cluster(['localhost'], port=9042)
  session = cluster.connect()

  print(list(session.execute('SELECT cql_version FROM system.local;')))

if __name__ == "__main__":
  main()