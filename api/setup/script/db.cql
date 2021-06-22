CREATE KEYSPACE ecommerce
WITH replication = {'class':'SimpleStrategy', 'replication_factor' : 2};

USE ecommerce;

CREATE TABLE order_status(
  order_status_id uuid PRIMARY KEY,
  order_status_order_id uuid,
  order_status_status text,
  order_status_timestamp timestamp,
  order_status_is_active boolean
);

CREATE TABLE transport_status(
  transport_status_id uuid PRIMARY KEY,
  transport_status_transport_id uuid,
  transport_status_status text,
  transport_status_is_idle boolean,
  transport_status_order_amount int,
  transport_status_order_amount_current int,
  transport_status_long float,
  transport_status_lat float,
  transport_status_timestamp timestamp,
  transport_status_is_active boolean
);

