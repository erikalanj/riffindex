--In phpmyAdmin, create a database called RiffIndex (matches hardcoded host in db_connect.php), and then paste this script 
--into the SQL window under the RiffIndex database. 

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('casual', 'fan', 'superfan', 'admin') NOT NULL,
    phone VARCHAR(15)
);

CREATE TABLE bands (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    date_created DATE NOT NULL,
    members TEXT NOT NULL,
    activity_status ENUM('active', 'inactive') NOT NULL,
    genre VARCHAR(100) NOT NULL
);


INSERT INTO bands (name, date_created, members, activity_status, genre) VALUES
('Nirvana', '1987-01-01', 'Kurt Cobain, Krist Novoselic, Dave Grohl', 'inactive', 'alt rock'),
('Foo Fighters', '1994-01-01', 'Dave Grohl, Nate Mendel, Chris Shiflett, Taylor Hawkins', 'active', 'alt rock'),
('The Rolling Stones', '1962-01-01', 'Mick Jagger, Keith Richards, Charlie Watts, Ronnie Wood', 'active', 'classic rock'),
('Led Zeppelin', '1968-01-01', 'Robert Plant, Jimmy Page, John Paul Jones, John Bonham', 'inactive', 'classic rock'),
('AC/DC', '1973-01-01', 'Angus Young, Brian Johnson, Malcolm Young, Cliff Williams', 'active', 'hard rock'),
('Guns N\' Roses', '1985-01-01', 'Axl Rose, Slash, Duff McKagan, Izzy Stradlin', 'active', 'hard rock'),
('Metallica', '1981-01-01', 'James Hetfield, Lars Ulrich, Kirk Hammett, Robert Trujillo', 'active', 'metal'),
('Iron Maiden', '1975-01-01', 'Bruce Dickinson, Steve Harris, Dave Murray, Adrian Smith', 'active', 'metal'),
('Pearl Jam', '1990-01-01', 'Eddie Vedder, Stone Gossard, Jeff Ament, Mike McCready', 'active', 'alt rock'),
('The Who', '1964-01-01', 'Roger Daltrey, Pete Townshend, John Entwistle, Keith Moon', 'inactive', 'classic rock');

