-- Create the table
CREATE TABLE weapon_popularity (
    ID INT PRIMARY KEY,
    WEAPON_CLASS VARCHAR(255),
    WEAPON_POPULARITY INT
);

-- Insert data into the table
INSERT INTO weapon_popularity (ID, WEAPON_CLASS, WEAPON_POPULARITY)
VALUES 
(1, 'Greatsword', 13867),
(2, 'Longsword', 9800),
(3, 'Sword and Shield', 9124),
(4, 'Dual Blades', 10821),
(5, 'Hammer', 3403),
(6, 'Hunting Horn', 2178),
(7, 'Lance', 1832),
(8, 'Gunlance', 1362),
(9, 'Switchaxe', 7762),
(10, 'Charge Blade', 11187),
(11, 'Insect Glaive', 11821),
(12, 'Light Bowgun', 4919),
(13, 'Heavy Bowgun', 2058),
(14, 'Bow', 4076),
(15, 'Prowler', 5573);
