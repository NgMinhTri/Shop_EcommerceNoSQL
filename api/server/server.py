from http.server import BaseHTTPRequestHandler, HTTPServer
from cassandra.cluster import Cluster
import pandas as pd
import json


class Server(BaseHTTPRequestHandler):
    def _set_headers(self):
        self.send_response(200)

        self.send_header('Content-type', 'application/json')
        self.send_header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS')
        self.send_header("Access-Control-Allow-Headers",  "Origin, X-Requested-With, Content-Type, Accept, Authorization") 
        self.send_header("Access-Control-Allow-Origin", "*")

        self.end_headers()
        
    def do_HEAD(self):
        self._set_headers()

    def do_OPTIONS(self):
        self._set_headers()         
        self.send_response(200, "ok")
      
    def do_GET(self):
        cluster = Cluster(['localhost'], port=9042)
        session = cluster.connect('ecommerce')

        if self.path.endswith("/order_status"):
            query = """
            SELECT *
            FROM order_status;
            """

            df = pd.DataFrame(list(session.execute(query)))
            result = df['order_status_status'].value_counts().to_json()

            self._set_headers()
            self.wfile.write(result.encode())

        if self.path.endswith("/transport_status"):
            query = """
            SELECT *
            FROM transport_status;
            """

            df = pd.DataFrame(list(session.execute(query)))
            result = df['transport_status_status'].value_counts().to_json()

            self._set_headers()
            self.wfile.write(result.encode())


def run(server_class=HTTPServer, handler_class=Server, port=3000):
    server_address = ('', port)
    httpd = server_class(server_address, handler_class)
    
    print(f'Starting httpd on {port} ...')
    httpd.serve_forever()
    
if __name__ == "__main__":
    from sys import argv
    
    if len(argv) == 2:
        run(port=int(argv[1]))
    else:
        run()