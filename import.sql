DROP DATABASE IF EXISTS GameDatabase;

CREATE DATABASE GameDatabase;

USE GameDatabase;

CREATE TABLE Games (
    GameID INT PRIMARY KEY AUTO_INCREMENT,
    Title VARCHAR(100),
    Genre VARCHAR(100),
    ReleaseYear INT,
    Publisher VARCHAR(100),
    InGamePurchases VARCHAR(5),
    HasWonAward VARCHAR(5),
    Foto VARCHAR(100)
);

INSERT INTO Games (Title, Genre, ReleaseYear, Publisher, InGamePurchases, HasWonAward, Foto) 
VALUES 
    ('Red Dead Redemption 2', 'Action-Adventure', 2018, 'Rockstar', 'ja', 'ja', 'rdr2.jpg'),
    ('Assassins Creed Valhalla', 'Action-Adventure', 2020, 'Ubisoft', 'ja', 'nee', 'acv.jpg'),
    ('The Legend of Zelda: Breath of the Wild', 'Action-Adventure', 2017, 'Nintendo', 'nee', 'ja', 'botw.jpg'),
    ('Uncharted 4: A Thiefs End', 'Action-Adventure', 2016, 'Naughty Dog', 'nee', 'nee', 'uncharted4.jpg'),
    ('Minecraft', 'Sandbox', 2011, 'Mojang', 'ja', 'ja', 'mc.jpg'),
    ('No Mans Sky', 'Sandbox', 2016, 'Hello Games', 'ja', 'nee', 'nms.jpg'),
    ('Stardew Valley', 'Sandbox', 2016, 'ConcernedApe', 'nee', 'nee', 'sv.jpg'),
    ('Grand Theft Auto V', 'Open-World', 2013, 'Rockstar', 'ja', 'ja', 'gtaV.jpg'),
    ('Watch Dogs: Legion', 'Open-World', 2020, 'Ubisoft', 'ja', 'nee', 'wdl.jpg'),
    ('Forza Horizon 4', 'Racing', 2018, 'Microsoft Studios', 'ja', 'ja', 'fh4.jpg'),
    ('Need for Speed: Heat', 'Racing', 2019, 'Electronic Arts', 'ja', 'nee', 'nfsh.jpg'),
    ('FIFA 22', 'Sports', 2021, 'EA Sports', 'ja', 'ja', 'fifa22.jpg'),
    ('NBA 2K21', 'Sports', 2020, '2K Sports', 'ja', 'nee', 'nba.jpg'),
    ('Rocket League', 'Sports', 2015, 'Psyonix', 'ja', 'ja', 'rl.jpg'),
    ('Cyberpunk 2077', 'Role-Playing', 2020, 'CD Projekt', 'ja', 'nee', 'cyberpunk.jpg'),
    ('Fallout 4', 'Role-Playing', 2015, 'Bethesda Softworks', 'ja', 'ja', 'fallout.jpg'),
    ('Mario Kart 8 Deluxe', 'Racing', 2017, 'Nintendo', 'nee', 'ja', 'mariokart.jpg'),
    ('F1 2021', 'Racing', 2021, 'Codemasters', 'ja', 'ja', 'f1.jpg'),
    ('Death Stranding', 'Action-Adventure', 2019, 'Kojima Productions', 'ja', 'ja', 'ds.jpg'),
    ('Far Cry 6', 'Action-Adventure', 2021, 'Ubisoft', 'ja', 'nee', 'farcry.jpg'),
    ('GTA: San Andreas', 'Open-World', 2004, 'Rockstar', 'nee', 'ja', 'gtasa.jpg'),
    ('The Elder Scrolls V: Skyrim', 'Role-Playing', 2011, 'Bethesda Softworks', 'nee', 'ja', 'skyrim.jpg'),
    ('Super Mario Odyssey', 'Platformer', 2017, 'Nintendo', 'nee', 'ja', 'oddyssey.jpg');

CREATE TABLE Users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100),
    password VARCHAR(100),
    role ENUM('admin', 'user') DEFAULT 'user'
);


INSERT INTO Users (username, password, role)
VALUES
    ('Rockstar', '$2y$10$3vz02F/RJM0WUzvxAKn23eTci9NoCt3BARdcDp8vWUhdnT64kBhIK', 'admin'),
    ('Ubisoft', '$2y$10$i6H6ecWgQdT78oOzhZ6KPejGWZTKQrg4S5hWG2emXxlBSEORAzjvC', 'admin'),
    ('Nintendo', '$2y$10$KKl.jBLUHIUWwh.fGtNcT.aQcYR9sO68XCHXireSTJM67RBsRHxQC', 'admin'),
    ('Naughty Dog', '$2y$10$abkfEYBn7TYTUcU9wKex9euAn/l5imqr.dVqm2rANV7QNQpm1cSBC', 'admin'),
    ('Mojang', '$2y$10$2NHIfrQ4TrIA8v36p6xA/e7S48eMU/nrT2IQ8YJHmh4VFJTPIfH1q', 'admin'),
    ('Hello Games', '$2y$10$U5VKRrXMdw.1SVwx22R13O9sL/q33hoD4RUwhB5kUHmKOx3zqaqjG', 'admin'),
    ('ConcernedApe', '$2y$10$YO.EOo3.AY9Mtgr4dwLbJuBZqikZc6ADAASBO5sjGpTqR.879mNuS', 'admin'),
    ('Microsoft Studios', '$2y$10$RtLVoH/azIecKEiV8ou0zO0Nf/2CZwjDXBI5etcLxypAYrSY/1AgC', 'admin'),
    ('Electronic Arts', '$2y$10$rTyCA9WmjSddjRgd3cNLoeReHsTRpsshGMdBnAfM1SHXMKjWUsvpm', 'admin'),
    ('EA Sports', '$2y$10$zaSKK4GeJeB0ArSpaP5wue.9O2jDtzkDdBY1ob04QhRB1/In9TV52', 'admin'),
    ('2K Sports', '$2y$10$Y9dPHHhWI5MkUXulz4vgUelrl6OnJS7T8UqgfMTk1fHiIwdVQEZ26', 'admin'),
    ('Psyonix', '$2y$10$guZjinsFb5kBi0i1TPJFAedtbcdSkJeO3HMTgaFunSeXEOsdCxgFa', 'admin'),
    ('CD Projekt', '$2y$10$JMC1UZb10wxpdXXJukKYbeOu58kFTQW1v6psWzr/HxGCSTlOGpdR6', 'admin'),
    ('Bethesda Softworks', '$2y$10$WJVLj9pPCpV8IHL7BXYMCedhNgNLe9xe2eqtPeaQLmg4wo8UFDwGC', 'admin'),
    ('Codemasters', '$2y$10$UcGnCH905KvPCI11jtrImuTpNVPpo7G9UetZS4QiMtFprcOurjwb.', 'admin'); 

ALTER TABLE games ADD FULLTEXT(Title);