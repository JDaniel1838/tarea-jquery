CREATE TABLE usuarios (
    id_users INT PRIMARY KEY,
    name_user VARCHAR(255) NOT NULL,
    phone_number_user VARCHAR(15) NOT NULL,
    age_user VARCHAR(3) NOT NULL
);


INSERT INTO usuarios (id_users, name_user, phone_number_user, age_user)
VALUES
    (1, 'Carlos', '2491382023', '1'),
    (2, 'Diana', '2372936272', '2'),
    (3, 'Jaime', '2382171292', '3'),
    (4, 'Joaquin', '2391272612', '4'),
    (5, 'Alberto', '1293626123', '5'),
    (6, 'Fatima', '1293612282', '6'),
    (9, 'Adrian', '2391271621', '7');
