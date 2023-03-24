CREATE TABLE tblUser (
    UserId INT(11),
    Username VARCHAR(50) PRIMARY KEY,
    Password VARCHAR(50) NOT NULL,
    Fullname VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Avatar VARCHAR(100),
    is_admin TINYINT(1) NOT NULL DEFAULT(0)
);

CREATE TABLE tblBook (
    ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(100),
    Author VARCHAR(100),
    Price DECIMAL(10, 2),
    Description TEXT,
    Image VARCHAR(100)
);

CREATE TABLE tblComment (
    ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    BookID INT(11),
    Username VARCHAR(50),
    Content TEXT,
    CreatedDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (BookID) REFERENCES tblBook(ID),
    FOREIGN KEY (Username) REFERENCES tblUser(Username)
);

