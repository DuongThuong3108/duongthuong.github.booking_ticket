CREATE DATABASE theater;
USE theater;

-- Table of Users
CREATE TABLE Users (
    UserID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Email VARCHAR(255) UNIQUE NOT NULL,
    PhoneNumber VARCHAR(20) UNIQUE NOT NULL
);

-- Table of Movies
CREATE TABLE Movies (
    MovieID INT PRIMARY KEY AUTO_INCREMENT,
    MovieName VARCHAR(255) NOT NULL,
    Description TEXT,
    Genre VARCHAR(100) NOT NULL,
    Duration INT NOT NULL,
    ReleaseDate DATE NOT NULL,
    Image VARCHAR(255) NOT NULL
);

-- Table of Cinemas
CREATE TABLE Cinemas (
    CinemaID INT PRIMARY KEY AUTO_INCREMENT,
    CinemaName VARCHAR(255) NOT NULL,
    Location VARCHAR(255) NOT NULL,
    NumberOfRooms INT NOT NULL
);

-- Table of Room
CREATE TABLE Rooms (
    RoomID INT PRIMARY KEY AUTO_INCREMENT,
    CinemaID INT NOT NULL,
    RoomName VARCHAR(255) NOT NULL,
    NumberOfSeats INT NOT NULL,
    CONSTRAINT fk_cinema FOREIGN KEY (CinemaID) REFERENCES Cinemas(CinemaID)
);

-- Table of Showtimes
CREATE TABLE Showtimes (
    ShowtimeID INT PRIMARY KEY AUTO_INCREMENT,
    MovieID INT NOT NULL,
    RoomID INT NOT NULL,
    Showtime DATETIME NOT NULL,
    CONSTRAINT fk_movie FOREIGN KEY (MovieID) REFERENCES Movies(MovieID),
    CONSTRAINT fk_rooms FOREIGN KEY (RoomID) REFERENCES Rooms(RoomID)
);

-- Tabel of Seats
CREATE TABLE Seats (
    SeatID INT PRIMARY KEY AUTO_INCREMENT,
    RoomID INT NOT NULL,
    SeatNumber VARCHAR(10) NOT NULL,
    SeatType ENUM ('VIP', 'STANDARD', 'DOUBLE') NOT NULL,
    SeatPrice DECIMAL (10,2) NOT NULL,
    CONSTRAINT fk_room FOREIGN KEY (RoomID) REFERENCES Rooms(RoomID)
);

-- Table of Payment
CREATE TABLE Payment (
    PaymentID INT PRIMARY KEY AUTO_INCREMENT,
    PaymentMethod VARCHAR(50) NOT NULL
);

-- Table of Tickets
CREATE TABLE Tickets (
    TicketID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT NOT NULL,
    ShowtimeID INT NOT NULL,
    SeatID INT NOT NULL,
    PurchaseDate DATETIME NOT NULL,
    PaymentID INT NOT NULL,
    CONSTRAINT fk_pay FOREIGN KEY (PaymentID) REFERENCES Payment(PaymentID),
    CONSTRAINT fk_userID FOREIGN KEY (UserID) REFERENCES Users(UserID),
    CONSTRAINT fk_showtimeID FOREIGN KEY (ShowtimeID) REFERENCES Showtimes(ShowtimeID),
    CONSTRAINT fk_seatID FOREIGN KEY (SeatID) REFERENCES Seats(SeatID)
);

-- Table of Review
CREATE TABLE Review (
    ReviewID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT NOT NULL,
    MovieID INT NOT NULL,
    Rating INT NOT NULL,
    Comment TEXT,
    ReviewDate DATETIME NOT NULL,
    CONSTRAINT fk_user FOREIGN KEY (UserID) REFERENCES Users(UserID),
    CONSTRAINT fk_movieID FOREIGN KEY (MovieID) REFERENCES Movies(MovieID),
    CONSTRAINT chk_rating CHECK (Rating BETWEEN 1 AND 5)
);


-- Table of Snack
CREATE TABLE Snack (
    SnackID INT PRIMARY KEY AUTO_INCREMENT,
    SnackName VARCHAR(255) NOT NULL,
    Description TEXT,
    Price DECIMAL(10, 2) NOT NULL,
    Image VARCHAR(255) NOT NULL
);

-- Table of SnackOrder
CREATE TABLE SnackOrder ( 
     SnackOrderID INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
     TicketID INT NOT NULL, 
     SnackID INT NOT NULL, 
     Quantity INT NOT NULL, 
     CONSTRAINT fk_ticket FOREIGN KEY (TicketID) REFERENCES Tickets(TicketID), 
     CONSTRAINT fk_snackID FOREIGN KEY (SnackID) REFERENCES Snack(SnackID) 
);
-- Insert table Users
INSERT INTO Users (Username, Password, Email, PhoneNumber) 
VALUES
('John Doe', 'johnspassword', 'john@example.com', '1234567890'),
('Jane Smith', 'janespassword', 'jane@example.com', '2345678901'),
('Michael Johnson', 'michaelspassword', 'michael@example.com', '3456789012'),
('Emily Brown', 'emilyspassword', 'emily@example.com', '4567890123'),
('William Wilson', 'williamspassword', 'william@example.com', '5678901234'),
('Emma Taylor', 'emmaspassword', 'emma@example.com', '6789012345'),
('Christopher Martinez', 'christopherspassword', 'christopher@example.com', '7890123456'),
('Olivia Anderson', 'oliviaspassword', 'olivia@example.com', '8901234567'),
('James Thomas', 'jamespassword', 'james@example.com', '9012345678'),
('Sophia Jackson', 'sophiaspassword', 'sophia@example.com', '0123456789'),
('Daniel White', 'danielspassword', 'daniel@example.com', '9876543210'),
('Ava Harris', 'avaspassword', 'ava@example.com', '8765432109'),
('Alexander Nelson', 'alexanderspassword', 'alexander@example.com', '7654321098'),
('Mia Martin', 'miaspassword', 'mia@example.com', '6543210987'),
('William Garcia', 'williamgpassword', 'williamg@example.com', '5432109876'),
('Abigail Robinson', 'abigailspassword', 'abigail@example.com', '4321098765'),
('Michael Clark', 'michaelcpassword', 'michaelc@example.com', '3210987654'),
('Sophia Walker', 'sophiawpassword', 'sophiaw@example.com', '2109876543'),
('Benjamin Wright', 'benjaminspassword', 'benjamin@example.com', '1098765432'),
('Isabella Lopez', 'isabellaspassword', 'isabella@example.com', '0987654321');


-- Insert table Movies
-- Insert table Movies
INSERT INTO Movies (MovieName, Description, Genre, Duration, ReleaseDate, Image) 
VALUES
('The Shawshank Redemption', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', 'Drama', 142, '1994-09-22', 'images/1.jpg'),
('The Godfather', 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.', 'Crime', 175, '1972-03-24', 'images/22.jpg'),
('The Dark Knight', 'When the menace known as The Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.', 'Action, Crime, Drama', 152, '2008-07-18', 'images/3.jpg'),
('Schindlers List', 'In German-occupied Poland during World War II, industrialist Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis.', 'Biography, Drama, History', 195, '1993-12-15', 'images/4.jpg'),
('The Lord of the Rings: The Return of the King', 'Gandalf and Aragorn lead the World of Men against Sauron\'s army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.', 'Action, Adventure, Drama', 201, '2003-12-17', 'images/5.jpg'),
('Pulp Fiction', 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', 'Crime, Drama', 154, '1994-10-14', 'images/6.jpg'),
('The Good, the Bad and the Ugly', 'A bounty hunting scam joins two men in an uneasy alliance against a third in a race to find a fortune in gold buried in a remote cemetery.', 'Western', 178, '1966-12-29', 'images/7.jpg'),
('Forrest Gump', 'The presidencies of Kennedy and Johnson, the Vietnam War, the Watergate scandal and other historical events unfold from the perspective of an Alabama man with an IQ of 75, whose only desire is to be reunited with his childhood sweetheart.', 'Drama, Romance', 142, '1994-07-06', 'images/8.jpg'),
('Fight Club', 'An insomniac office worker and a devil-may-care soap maker form an underground fight club that evolves into much more.', 'Drama', 139, '1999-10-15', 'images/9.jpg'),
('Inception', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.', 'Action, Adventure, Sci-Fi', 148, '2010-07-16', 'images/10.jpg'),
('The Matrix', 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.', 'Action, Sci-Fi', 136, '1999-03-31', 'images/11.jpg'),
('Goodfellas', 'The story of Henry Hill and his life in the mob, covering his relationship with his wife Karen Hill and his mob partners Jimmy Conway and Tommy DeVito in the Italian-American crime syndicate.', 'Biography, Crime, Drama', 146, '1990-09-19', 'images/12.jpg'),
('Star Wars: Episode V - The Empire Strikes Back', 'After the Rebels are brutally overpowered by the Empire on the ice planet Hoth, Luke Skywalker begins Jedi training with Yoda, while his friends are pursued by Darth Vader.', 'Action, Adventure, Fantasy', 124, '1980-06-20', 'images/13.jpg'),
('The Silence of the Lambs', 'A young F.B.I. cadet must receive the help of an incarcerated and manipulative cannibal killer to help catch another serial killer, a madman who skins his victims.', 'Crime, Drama, Thriller', 118, '1991-02-14', 'images/14.jpg'),
('Se7en', 'Two detectives, a rookie and a veteran, hunt a serial killer who uses the seven deadly sins as his motives.', 'Crime, Drama, Mystery', 127, '1995-09-22', 'images/15.jpg'),
('The Lord of the Rings: The Fellowship of the Ring', 'A meek Hobbit from the Shire and eight companions set out on a journey to destroy the powerful One Ring and save Middle-earth from the Dark Lord Sauron.', 'Action, Adventure, Drama', 178, '2001-12-19', 'images/16.jpg'),
('The Usual Suspects', 'A sole survivor tells of the twisty events leading up to a horrific gun battle on a boat, which began when five criminals met at a seemingly random police lineup.', 'Crime, Mystery, Thriller', 106, '1995-09-15', 'images/17.jpg'),
('The Lion King', 'Lion cub and future king Simba searches for his identity. His eagerness to please others and penchant for testing his boundaries sometimes gets him into trouble.', 'Animation, Adventure, Drama', 88, '1994-06-24', 'images/18.jpg'),
('Saving Private Ryan', 'Following the Normandy Landings, a group of U.S. soldiers go behind enemy lines to retrieve a paratrooper whose brothers have been killed in action.', 'Drama, War', 169, '1998-07-24', 'images/19.jpg'),
('The Green Mile', 'The lives of guards on Death Row are affected by one of their charges: a black man accused of child murder and rape, yet who has a mysterious gift.', 'Crime, Drama, Fantasy', 189, '1999-12-10', 'images/20.jpg');


-- Insert table Cinemas
INSERT INTO Cinemas (CinemaName, Location, NumberOfRooms) 
VALUES
('Cineplex A', '123 Main Street, City A', 5),
('City Cinema B', '456 Elm Street, City B', 4),
('Downtown Theaters', '789 Oak Street, City C', 6),
('Golden Theater', '101 Maple Avenue, City D', 7),
('Luxury Cinemas E', '222 Pine Street, City E', 4),
('Majestic Movies', '333 Cedar Street, City F', 5),
('Starlight Cinema F', '444 Birch Street, City G', 6),
('Sunset Screens', '555 Walnut Street, City H', 4),
('Valley View Theater', '666 Spruce Street, City I', 5),
('Vista Cinemas', '777 Oak Street, City J', 6),
('CineMagic K', '888 Pine Street, City K', 7),
('Central City Cinema', '999 Maple Street, City L', 4),
('Parkside Pictures', '111 Cedar Street, City M', 5),
('Skyline Theater', '222 Birch Street, City N', 6),
('Cinema Paradise', '333 Walnut Street, City O', 4),
('Palace Theater', '444 Spruce Street, City P', 5),
('Silver Screen Cinemas', '555 Oak Street, City Q', 6),
('Riverfront Movies', '666 Pine Street, City R', 7),
('Grandview Theater', '777 Maple Street, City S', 4),
('Metroplex T', '888 Cedar Street, City T', 5);

-- Insert table room
INSERT INTO Rooms (CinemaID, RoomName, NumberOfSeats) 
VALUES
(1, 'A1', 120),
(1, 'A2', 110),
(1, 'B1', 90),
(2, 'B2', 100),
(2, 'C1', 80),
(2, 'C2', 130),
(3, 'D1', 140),
(3, 'D2', 120),
(3, 'E1', 100),
(4, 'E2', 150),
(4, 'F1', 130),
(5, 'F2', 120),
(5, 'G1', 110),
(6, 'G2', 100),
(6, 'H1', 90),
(7, 'H2', 110),
(7, 'I1', 100),
(8, 'I2', 120),
(8, 'J1', 80),
(9, 'J2', 130);

-- Insert table showtimes
INSERT INTO Showtimes (MovieID, RoomID, Showtime) VALUES
(1, 1, '2024-06-12 10:00:00'),
(1, 1, '2024-06-12 13:00:00'),
(1, 2, '2024-06-12 13:30:00'),
(1, 2, '2024-06-12 16:30:00'),
(2, 3, '2024-06-12 11:00:00'),
(2, 3, '2024-06-12 14:00:00'),
(2, 3, '2024-06-12 17:00:00'),
(2, 4, '2024-06-12 11:30:00'),
(2, 4, '2024-06-12 14:30:00'),
(2, 4, '2024-06-12 17:30:00'),
(3, 5, '2024-06-12 12:00:00'),
(3, 5, '2024-06-12 15:00:00'),
(3, 5, '2024-06-12 18:00:00'),
(3, 6, '2024-06-12 12:30:00'),
(3, 6, '2024-06-12 15:30:00'),
(3, 6, '2024-06-12 18:30:00'),
(4, 7, '2024-06-12 13:00:00'),
(4, 7, '2024-06-12 16:00:00'),
(4, 7, '2024-06-12 19:00:00'),
(4, 7, '2024-06-12 22:30:00');

-- Insert table Seats
INSERT INTO Seats (RoomID, SeatNumber, SeatType, SeatPrice) 
VALUES
(1, 'A1', 'VIP', 100.00),
(1, 'A2', 'VIP', 100.00),
(1, 'A3', 'STANDARD', 80.00),
(1, 'A4', 'STANDARD', 80.00),
(1, 'B1', 'VIP', 100.00),
(1, 'B2', 'STANDARD', 80.00),
(1, 'B3', 'STANDARD', 80.00),
(1, 'B4', 'STANDARD', 80.00),
(1, 'C1', 'STANDARD', 80.00),
(1, 'C2', 'DOUBLE', 150.00),
(2, 'A1', 'STANDARD', 80.00),
(2, 'A2', 'STANDARD', 80.00),
(2, 'A3', 'STANDARD', 80.00),
(2, 'A4', 'STANDARD', 80.00),
(2, 'B1', 'STANDARD', 80.00),
(2, 'B2', 'STANDARD', 80.00),
(2, 'B3', 'STANDARD', 80.00),
(2, 'B4', 'STANDARD', 80.00),
(2, 'C1', 'STANDARD', 80.00),
(2, 'C2', 'DOUBLE', 150.00),
(3, 'A1', 'VIP', 100.00),
(3, 'A2', 'VIP', 100.00),
(3, 'A3', 'STANDARD', 80.00),
(3, 'A4', 'STANDARD', 80.00),
(3, 'B1', 'VIP', 100.00),
(3, 'B2', 'STANDARD', 80.00),
(3, 'B3', 'STANDARD', 80.00),
(3, 'B4', 'STANDARD', 80.00),
(4, 'A1', 'VIP', 100.00),
(4, 'A2', 'VIP', 100.00),
(4, 'A3', 'STANDARD', 80.00),
(4, 'A4', 'STANDARD', 80.00),
(5, 'A1', 'VIP', 100.00),
(5, 'A2', 'STANDARD', 80.00),
(5, 'A3', 'STANDARD', 80.00),
(5, 'A4', 'VIP', 80.00),
(5, 'B1', 'VIP', 80.00),
(5, 'B2', 'DOUBLE', 150.00);


-- Insert table Payment
INSERT INTO Payment (PaymentMethod) VALUES 
('Credit Card'),
('Debit Card'),
('PayPal'),
('Cash');

-- Insert table Tickets
INSERT INTO Tickets (UserID, ShowtimeID, SeatID, PurchaseDate, PaymentID) 
VALUES
(1,1,1, '2024-06-20 01:12:00',1),
(2,1,12, '2024-05-20 00:12:00',2),
(3,6,3, '2024-04-20 07:30:00',4),
(3,1,4, '2024-05-30 09:22:00',3),
(3,2,5, '2024-04-10 10:20:00',1),
(4,1,6, '2024-05-20 11:12:00',2),
(5,4,7, '2024-07-20 10:12:00',1),
(6,13,8, '2024-05-04 00:45:00',4),
(6,13,9, '2024-08-19 12:45:00',3),
(7,4,10, '2024-05-20 00:12:00',1),
(8,4,11, '2024-06-19 14:12:00',2),
(9,4,12, '2024-05-19 17:34:00',1),
(10,1,13, '2024-04-20 10:37:00',1),
(11,4,05, '2024-05-20 11:12:00',3),
(11,2,14, '2024-03-21 14:24:00',1),
(12,5,15, '2024-05-19 11:12:00',1),
(15,19,14, '2024-06-25 16:12:00',2),
(17,18,13, '2024-08-15 11:16:00',1),
(20,9,11,  '2024-11-20 14:26:00',4),
(12,15,08, '2024-05-22 21:30:00',2),
(13, 3, 16, '2024-06-18 12:00:00', 1),
(14, 7, 17, '2024-07-21 15:45:00', 2),
(16, 8, 18, '2024-08-10 13:25:00', 3),
(18, 10, 19, '2024-09-09 10:10:00', 4),
(19, 11, 20, '2024-10-12 09:30:00', 1),
(20, 12, 16, '2024-11-15 18:20:00', 2),
(15, 14, 20, '2024-12-19 17:50:00', 3),
(11, 16, 17, '2024-06-16 14:40:00', 4),
(7, 17, 12, '2024-07-10 11:35:00', 1),
(5, 20, 16, '2024-08-20 12:45:00', 2);

-- Insert table snack
INSERT INTO Snack (SnackName, Description, Price, Image) 
VALUES
('Popcorn', 'Classic movie snack', 5.00, 'SnackImage/1.jpg'),
('Soda', 'Refreshing drink', 3.00, 'SnackImage/2.jpg'),
('Nachos', 'Crunchy snack with cheese dip', 7.00, 'SnackImage/3.jpg'),
('Hot Dog', 'Classic stadium food', 6.00, 'SnackImage/4.jpg'),
('Candy', 'Sweet treats for your movie', 4.00, 'SnackImage/5.jpg'),
('Pretzel', 'Salty snack', 4.50, 'SnackImage/6.jpg'),
('Ice Cream', 'Cool down with a cone', 5.50, 'SnackImage/7.jpg'),
('Chips', 'Crunchy potato chips', 3.50, 'SnackImage/8.jpg'),
('Chocolate Bar', 'Indulge your sweet tooth', 2.50, 'SnackImage/9.jpg'),
('Cookie', 'Homemade cookies', 3.00, 'SnackImage/10.jpg');

-- Insert table Snack Order
INSERT INTO SnackOrder (TicketID, SnackID, Quantity) 
VALUES
(1, 1, 2),
(2, 3, 1),
(3, 2, 3),
(4, 4, 2),
(5, 5, 1),
(6, 6, 2),
(7, 7, 1),
(8, 8, 3),
(9, 9, 2),
(10, 10, 1);

-- Insert table Review
INSERT INTO Review (UserID, MovieID, Rating, Comment, ReviewDate) 
VALUES
(1, 1, 4, 'Great movie, loved the storyline!', '2024-06-12 10:30:00'),
(2, 1, 5, 'Absolutely amazing, must watch!', '2024-06-12 11:00:00'),
(3, 1, 4, 'Must watch!', '2024-06-12 12:00:00'),
(3, 2, 3, 'Decent movie, could have been better.', '2024-06-12 12:00:00'),
(2, 2, 5, 'Absolutely amazing!', '2024-06-12 11:00:00'),
(4, 3, 5, 'Incredible performance by the actors!', '2024-06-12 13:00:00'),
(5, 4, 4, 'Enjoyed every minute of it!', '2024-06-12 14:00:00'),
(6, 5, 2, 'Disappointing, expected more.', '2024-06-12 15:00:00'),
(7, 6, 5, 'One of the best movies I have ever seen!', '2024-06-12 16:00:00'),
(8, 7, 4, 'Solid movie, worth watching.', '2024-06-12 17:00:00'),
(2, 7, 5, 'I loved it!!', '2024-06-12 11:00:00'),
(9, 8, 3, 'Average movie, nothing extraordinary.', '2024-06-12 18:00:00'),
(9, 8, 4, 'Great', '2024-06-12 19:00:00'),
(9, 8, 5, 'Highly recommend', '2024-06-12 20:00:00'),
(9, 8, 5, 'Should watch.', '2024-06-12 08:00:00'),
(10, 9, 5, 'Brilliant storyline, loved it!', '2024-06-12 19:00:00'),
(11, 10, 4, 'Great cinematography!', '2024-06-12 20:00:00'),
(12, 11, 2, 'Not my cup of tea.', '2024-06-12 21:00:00'),
(13, 12, 3, 'Could have been better.', '2024-06-12 22:00:00'),
(13, 12, 4, 'Have been better.', '2024-06-12 20:00:00'),
(14, 13, 4, 'Captivating storyline.', '2024-06-12 23:00:00'),
(15, 14, 5, 'Absolutely fantastic!', '2024-06-12 10:00:00'),
(16, 15, 4, 'Thats so so', '2024-06-12 16:30:00'),
(16, 15, 4, 'Quite good.', '2024-06-12 11:30:00'),
(16, 15, 5, 'Highly recommend!', '2024-06-12 23:30:00'),
(17, 16, 3, 'Not bad, worth a watch.', '2024-06-12 12:30:00'),
(18, 17, 5, 'A masterpiece!', '2024-06-12 13:30:00'),
(18, 17, 4, 'Not too bad', '2024-06-12 13:30:00'),
(19, 18, 4, 'Solid performances.', '2024-06-12 14:30:00'),
(20, 19, 3, 'Interesting concept.', '2024-06-12 15:30:00');


-- BUSINESS BASIC QUESTIONS 
-- 1) Identify movies with an average rating above 4 (sort high to low), only shows movies with at least 2 reviews
SELECT m.MovieName, AVG(r.Rating) AS AverageRating
FROM Movies m
INNER JOIN Review r ON m.MovieID = r.MovieID
GROUP BY m.MovieID, m.MovieName
HAVING AVG(r.Rating) > 4 AND COUNT(R.ReviewID) >= 2
ORDER BY AVG(r.Rating) DESC;

-- 2) List the top 3 most popular snacks (by quantity ordered) along with their total quantity ordered:
SELECT sn.SnackName, SUM(so.Quantity) AS TotalQuantityOrdered
FROM Snack sn
INNER JOIN SnackOrder so ON sn.SnackID = so.SnackID
GROUP BY sn.SnackID, sn.SnackName
ORDER BY TotalQuantityOrdered DESC
LIMIT 3;

-- 3) Calculate the total sales amount (by quantity tickets) for each movie:
SELECT m.MovieID, m.MovieName, SUM(s.SeatPrice) AS TotalSale
FROM Movies m
JOIN Showtimes st ON m.MovieID = st.MovieID
JOIN Tickets t ON st.ShowtimeID = t.ShowtimeID
JOIN Seats s ON t.SeatID = s.SeatID
GROUP BY m.MovieID, m.MovieName;

-- 4) Top 3 customer with the most tickets bought
SELECT u.UserID, SUM(t.TicketID) AS total_tickets
FROM Tickets t
INNER JOIN Users u ON t.UserID = u.UserID
GROUP BY u.UserID
ORDER BY SUM(t.TicketID) DESC
LIMIT 3;

-- 5) Top 2 movie genres with the highest number of tickets sold
SELECT m.Genre, COUNT(t.TicketID) AS ticket_count
FROM Movies m
INNER JOIN Showtimes s ON m.MovieID = s.MovieID
INNER JOIN Tickets t ON s.ShowtimeID=t.ShowtimeID
GROUP BY m.Genre
ORDER BY ticket_count DESC
LIMIT 2;

-- 6) Statistics on the number of guests in each room
SELECT r.RoomID, r.RoomName, COUNT(t.TicketID) AS TotalCustomers
FROM Rooms r
LEFT JOIN Showtimes s ON r.RoomID = s.RoomID
LEFT JOIN Tickets t ON s.ShowtimeID = t.ShowtimeID 
GROUP BY r.RoomID, r.RoomName;

-- 7) Top 3 months with highest revenue (quantity by tickets)
SELECT MONTH(PurchaseDate) AS Month, YEAR(t.PurchaseDate) AS Year, SUM(s.SeatPrice) AS TotalSale
FROM Tickets t
JOIN Seats s ON t.SeatID = s.SeatID
GROUP BY MONTH(PurchaseDate), YEAR(t.PurchaseDate)
ORDER BY TotalSale DESC
LIMIT 3;


-- 8) Top 3 months with highest revenue (quantity by tickets + snack)
SELECT MONTH(t.PurchaseDate) AS Month, YEAR(t.PurchaseDate) AS Year, SUM(s.SeatPrice) + COALESCE(SUM(so.Quantity * sn.Price), 0) AS TotalSale
FROM Tickets t
JOIN Seats s ON t.SeatID = s.SeatID
LEFT JOIN SnackOrder so ON t.TicketID = so.TicketID
LEFT JOIN Snack sn ON so.SnackID = sn.SnackID
GROUP BY YEAR(t.PurchaseDate), MONTH(t.PurchaseDate)
ORDER BY TotalSale DESC
LIMIT 3;

-- 9) The most favorite theater (quantity by tickets)
SELECT c.CinemaName, COUNT(t.TicketID) AS Number_of_tickets_sold
FROM Tickets t
JOIN Showtimes s ON t.ShowtimeID = s.ShowtimeID
JOIN Rooms r ON s.RoomID = r.RoomID
JOIN Cinemas c ON r.CinemaID = c.CinemaID
GROUP BY c.CinemaName
ORDER BY Number_of_tickets_sold DESC
LIMIT 1;

-- 10. Show the comments of clients for each movies
SELECT users.UserID, users.Username, movies.MovieName, review.Comment from users
JOIN review ON users.UserID = review.UserID
JOIN movies ON review.MovieID = movies.MovieID
GROUP BY users.UserID, users.Username, movies.MovieName, review.Rating, review.Comment;

-- 11. Show the Movies Recommendation by Genre
SELECT m.MovieName, m.Genre
FROM movies m
WHERE m.MovieID IN (
  SELECT r.MovieID
  FROM review r
  WHERE r.UserID = (
    SELECT UserID
    FROM users
    WHERE Username = 'Jane Smith'
  )
)
ORDER BY m.Genre;

-- 12. Name customers buying tickets with the name of the movie in the Crime genre
SELECT u.Username, m.MovieName
FROM Tickets t
INNER JOIN Users u ON t.UserID = u.UserID
INNER JOIN Showtimes s ON t.ShowtimeID = s.ShowtimeID
INNER JOIN Movies m ON s.MovieID = m.MovieID
WHERE m.Genre = 'Crime';


-- BUSINESS ADVANCED QUESTIONS 

-- 1) This PROCEDURE retrieves the showtimes for a specific movie.
DELIMITER //

CREATE PROCEDURE GetMovieShowtimes(
    IN p_MovieID INT
)
BEGIN
    SELECT Showtimes.Showtime, Cinemas.CinemaName, Rooms.RoomName
    FROM Showtimes
    INNER JOIN Rooms ON Showtimes.RoomID = Rooms.RoomID
    INNER JOIN Cinemas ON Rooms.CinemaID = Cinemas.CinemaID
    WHERE Showtimes.MovieID = p_MovieID;
END //

DELIMITER ;
CALL GetMovieShowtimes(1);
-- 2) User PROCEDURE add new user information
DELIMITER //
CREATE PROCEDURE AddNewUser( 
	IN P_Username VARCHAR(50), 
	IN P_Password VARCHAR(255),
	IN P_Email VARCHAR(100),
	IN P_PhoneNumber VARCHAR(20)
)

BEGIN
	INSERT INTO Users (Username, Password, Email, PhoneNumber)
    VALUES (p_Username, p_Password, P_Email, p_PhoneNumber); 
END //
DELIMITER ;
CALL AddNewUser('john_doe', 'password123', 'john@gmail.com', '123456789');
SELECT * FROM users;


-- 3) UPDATE TRIGGER
DELIMITER //
CREATE TRIGGER UpdateTotalSalesAfterTicketPurchase
AFTER INSERT ON Tickets
FOR EACH ROW
BEGIN
    DECLARE total_sales DECIMAL(10, 2);
    -- Calculate total sales for the movie associated with the new ticket
    SELECT SUM(Seats.SeatPrice)
    INTO total_sales
    FROM Seats
    JOIN Showtimes ON NEW.ShowtimeID = Showtimes.ShowtimeID
    JOIN Movies ON Showtimes.MovieID = Movies.MovieID
    WHERE Seats.SeatID = NEW.SeatID;
    
    -- Update total sales in the Movies table
    UPDATE Movies
    SET TotalSales = TotalSales + total_sales
    WHERE MovieID = (SELECT MovieID FROM Showtimes WHERE ShowtimeID = NEW.ShowtimeID);
END //
DELIMITER ;

-- 4) INSERT TRIGGER
DELIMITER //
CREATE TRIGGER AddNewUser
AFTER INSERT ON Tickets
FOR EACH ROW
BEGIN
	DECLARE newUserID INT;
	-- Generate a new UserID
	SELECT MAX(UserID) + 1 INTO newUserID FROM Users;
	IF newUserID IS NULL THEN
	SET newUserID = 1;
	END IF;
	-- Insert new user
	INSERT INTO Users (UserID, Username, Password, Email, PhoneNumber)
	VALUES (newUserID, 'NewUser', 'defaultpassword', 'newuser@example.com', '1234567890');
END//
DELIMITER ;

-- 5.Delete TRIGGER
CREATE TRIGGER before_movie_delete
BEFORE DELETE ON Movies
FOR EACH ROW
BEGIN
    DELETE FROM Review WHERE MovieID = OLD.MovieID
END //

DELIMITER ;

-- 6)  Create a VIEW that displays detailed information about the booking, including information about the candy ordered
CREATE VIEW Ticket_Snack_Details AS
SELECT T.TicketID, U.Username, M.MovieName, S.Showtime, Ss.SeatNumber, P.PaymentMethod, T.PurchaseDate, Sn.SnackName, SO.Quantity
FROM Tickets T
INNER JOIN Users U ON T.UserID = U.UserID
INNER JOIN Showtimes S ON T.ShowtimeID = S.ShowtimeID
INNER JOIN Movies M ON S.MovieID = M.MovieID
INNER JOIN Seats SS ON T.SeatID = Ss.SeatID
INNER JOIN Payment P ON T. PaymentID = P.PaymentID
LEFT JOIN SnackOrder SO ON T.TicketID = SO.TicketID
LEFT JOIN Snack Sn ON SO.SnackID = Sn.SnackID;

SELECT * FROM Ticket_Snack_Details;













