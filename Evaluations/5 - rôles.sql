CREATE ROLE 'r_gescom_marketing';

GRANT SELECT, INSERT, UPDATE, DELETE
ON gescom_afpa.products
TO 'r_gescom_marketing';

GRANT SELECT, INSERT, UPDATE, DELETE
ON gescom_afpa.categories
TO 'r_gescom_marketing';

GRANT SELECT
ON gescom_afpa.orders
TO 'r_gescom_marketing';

GRANT SELECT
ON gescom_afpa.orders_details
TO 'r_gescom_marketing';

GRANT SELECT
ON gescom_afpa.customers
TO 'r_gescom_marketing';