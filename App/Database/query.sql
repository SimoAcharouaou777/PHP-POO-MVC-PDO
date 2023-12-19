CREATE TABLE role (
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(20)
);
CREATE TABLE users (
    id int PRIMARY KEY AUTO_INCREMENT,
    user_name varchar(25),
    full_name varchar(25),
    email varchar(50) UNIQUE,
    password varchar(300),
    phone varchar(20),
    budget double,
    role_id int ,
    FOREIGN KEY (role_id) REFERENCES role(id)
);
CREATE TABLE Book(
    id int PRIMARY KEY AUTO_INCREMENT,
    title varchar(50),
    author varchar(50),
    genre varchar(40),
    description varchar(255),
    publication_year date,
    total_copies int ,
    available_copies int 
);
CREATE TABLE Reservation (
    id int PRIMARY KEY AUTO_INCREMENT,
    description varchar(255),
    reservation_date date,
    return_date date,
    is_returned int,
    user_id int ,
    book_id int,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (book_id) REFERENCES Book(id)
);
INSERT INTO book (title , author , genre , description , publication_year , total_copies  , available_copies)
VALUES("HARRY POTER" , "abaal" , "fantasy" , "the best" , "1989" , "20" , "19");
