DROP DATABASE IF EXISTS GameDatabase;

CREATE DATABASE GameDatabase;

USE GameDatabase;

CREATE TABLE Games (
    GameID INT PRIMARY KEY AUTO_INCREMENT,
    Title VARCHAR(100),
    Genre ENUM('Action-Adventure', 'Sandbox', 'Open-World', 'Racing', 'Sports') NOT NULL,
    ReleaseYear INT,
    Publisher VARCHAR(100),
    InGamePurchases VARCHAR(5),
    HasWonAward VARCHAR(5)
);

INSERT INTO Games (Title, Genre, ReleaseYear, Publisher, InGamePurchases, HasWonAward) 
VALUES 
    ('Red Dead Redemption 2', 'Action-Adventure', 2018, 'Rockstar', 'ja', 'ja'),
    ('Assassins Creed Valhalla', 'Action-Adventure', 2020, 'Ubisoft', 'ja', 'nee'),
    ('The Legend of Zelda: Breath of the Wild', 'Action-Adventure', 2017, 'Nintendo', 'nee', 'ja'),
    ('Uncharted 4: A Thiefs End', 'Action-Adventure', 2016, 'Naughty Dog', 'nee', 'nee'),
    ('Minecraft', 'Sandbox', 2011, 'Mojang', 'ja', 'ja'),
    ('No Mans Sky', 'Sandbox', 2016, 'Hello Games', 'ja', 'nee'),
    ('Stardew Valley', 'Sandbox', 2016, 'ConcernedApe', 'nee', 'nee'),
    ('Grand Theft Auto V', 'Open-World', 2013, 'Rockstar', 'ja', 'ja'),
    ('Watch Dogs: Legion', 'Open-World', 2020, 'Ubisoft', 'ja', 'nee'),
    ('Forza Horizon 4', 'Racing', 2018, 'Microsoft Studios', 'ja', 'ja'),
    ('Need for Speed: Heat', 'Racing', 2019, 'Electronic Arts', 'ja', 'nee'),
    ('FIFA 22', 'Sports', 2021, 'EA Sports', 'ja', 'ja'),
    ('NBA 2K21', 'Sports', 2020, '2K Sports', 'ja', 'nee'),
    ('Rocket League', 'Sports', 2015, 'Psyonix', 'ja', 'ja');

CREATE TABLE Users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100),
    password VARCHAR(100)
);


INSERT INTO Users (username, password)
VALUES
    ('Rockstar', '$2y$10$3vz02F/RJM0WUzvxAKn23eTci9NoCt3BARdcDp8vWUhdnT64kBhIK'),
    ('Ubisoft', '$2y$10$i6H6ecWgQdT78oOzhZ6KPejGWZTKQrg4S5hWG2emXxlBSEORAzjvC'),
    ('Nintendo', '$2y$10$KKl.jBLUHIUWwh.fGtNcT.aQcYR9sO68XCHXireSTJM67RBsRHxQC'),
    ('Naughty Dog', '$2y$10$abkfEYBn7TYTUcU9wKex9euAn/l5imqr.dVqm2rANV7QNQpm1cSBC'),
    ('Mojang', '$2y$10$2NHIfrQ4TrIA8v36p6xA/e7S48eMU/nrT2IQ8YJHmh4VFJTPIfH1q'),
    ('Hello Games', '$2y$10$U5VKRrXMdw.1SVwx22R13O9sL/q33hoD4RUwhB5kUHmKOx3zqaqjG'),
    ('ConcernedApe', '$2y$10$YO.EOo3.AY9Mtgr4dwLbJuBZqikZc6ADAASBO5sjGpTqR.879mNuS'),
    ('Microsoft Studios', '$2y$10$RtLVoH/azIecKEiV8ou0zO0Nf/2CZwjDXBI5etcLxypAYrSY/1AgC'),
    ('Electronic Arts', '$2y$10$rTyCA9WmjSddjRgd3cNLoeReHsTRpsshGMdBnAfM1SHXMKjWUsvpm'),
    ('EA Sports', '$2y$10$zaSKK4GeJeB0ArSpaP5wue.9O2jDtzkDdBY1ob04QhRB1/In9TV52'),
    ('2K Sports', '$2y$10$Y9dPHHhWI5MkUXulz4vgUelrl6OnJS7T8UqgfMTk1fHiIwdVQEZ26'),
    ('Psyonix', '$2y$10$guZjinsFb5kBi0i1TPJFAedtbcdSkJeO3HMTgaFunSeXEOsdCxgFa'); 
