INSERT INTO `suppliers` (`sup_id`, `sup_name`, `sup_city`, `sup_countries_id`, `sup_address`, `sup_zipcode`, `sup_contact`, `sup_phone`, `sup_mail`) 
    VALUES ('1', 'Robert', 'Amiens', 'FR', '111 rue  fdsquhnidq', '80000', 'QZFQSEFEQZSF', '0303030303', 'DQFSKIJDQSD@QDSJNIDQS.COM'), 
    ('2', 'MICHEL', 'albanin', 'AL', '123213 RUE QSHUDNSQD', '32132', 'FDSQFDSFDSFDSFSFDSFDSFDSF', '4343412341', 'QFDSJDSQ@GMADSQJU.COM'), 
    ('3', 'ALBERT', 'NANTES', 'FR', '2 RUE QSJHDQSD', '32323', 'QFSDFQSDFDSQF', '3232323212', 'QSDSDS@QDSJIQDS.COM');

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_parent_id`) 
    VALUES ('1', 'Alimentaire', NULL),
    ('2', 'Viande', '1'),
    ('3', 'Poulet', '2');

INSERT INTO `customers` (`cus_id`, `cus_lastname`, `cus_firstname`, `cus_address`, `cus_zipcode`, `cus_city`, `cus_countries_id`, `cus_mail`, `cus_phone`, `cus_password`, `cus_add_date`, `cus_update_date`) 
    VALUES ('1', 'AAA', 'bbb', '123 rue DSQHJDSQ', '13221', 'Amiens', 'FR', 'qdsqsdqsd@dqsdsq.com', '12312312', 'dsqdqezdadacxazz', '2021-09-15 15:07:03', NULL), 
    ('2', 'BBBB', 'ccccc', '32131 rue qdshunds', '32321', 'Nantes', 'FR', 'qdsdsd@qsdjiqsd.FR', '34213213', 'fdsqfqfzqzzefz', '2021-09-14 15:07:03', NULL), 
    ('3', 'DDDDD', 'eeeeee', '23 rue dsqjhudq', '32132', 'Albanie', 'AL', 'dqsdqs@sqdjds.fr', '231312312', 'dezdzzeczdqdz', '2021-09-05 15:07:03', NULL);

INSERT INTO `orders` (`ord_id`, `ord_order_date`, `ord_payment_date`, `ord_ship_date`, `ord_reception_date`, `ord_status`, `ord_cus_id`) 
    VALUES ('1', '2021-09-16', '2021-09-17', NULL, NULL, 'En cours', '1'), ('2', '2021-09-15', '2021-09-16', NULL, NULL, 'En cours', '2'), 
    ('3', '2021-09-05', '2021-09-15', '2021-09-17', NULL, 'En cours', '2');

INSERT INTO `posts` (`pos_id`, `pos_libelle`)
    VALUES ('1', 'UAZ'), 
    ('2', 'TAZER'), 
    ('3', 'FDSQDS');

INSERT INTO `employees` (`emp_id`, `emp_superior_id`, `emp_pos_id`, `emp_lastname`, `emp_firstname`, `emp_address`, `emp_zipcode`, `emp_city`, `emp_mail`, `emp_phone`, `emp_salary`, `emp_enter_date`, `emp_gender`, `emp_children`) 
    VALUES ('1', NULL, '1', 'ADAAZE', 'zaeea', '1123 rue qhdsUDSQOIUDS', '12312', 'jsaipa', 'dqsdqsd@dsqdqs.com', '12313213', '1111111', '2021-09-14', 'H', '2'), 
    ('2', '1', '2', 'VSDFD', 'azea', '123 rue qsdhunqds', '32132', 'aucuneidee', 'qdqsd@dsqd.fr', '321321', '2222', '2021-09-07', 'F', '0'), 
    ('3', '2', '3', 'AZEAZE', 'dsqdqsd', '2 rue qjhdbsndqsdsq', '32132', 'ahahah', 'JHUDQSDHUIQS@djdsqd.fr', '4214214', '1111', '2021-09-09', 'F', '0');