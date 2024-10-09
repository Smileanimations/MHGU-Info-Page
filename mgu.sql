DROP DATABASE IF EXISTS `MGU`;

CREATE DATABASE `MGU`;

USE `MGU`;

CREATE TABLE `weapons` (
    id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    info VARCHAR(500)
);

INSERT INTO `weapons`(name, info) VALUES
    ('Great Sword', 'A mighty sword that makes up for its lack of mobility with huge, punishing attacks. The Great Sword can also block attacks, making it a good all-around weapon.'),
    ('Long Sword', 'A nimble weapon capable of extended combos. Charge up energy with each attack to use your powerful Spirit Blade attack'),
    ('Sword and Shield', 'A mobile weapon with fast recovery time between attacks. You can even use items or attack while blocking'),
    ('Dual Blades', 'A weapon that blitzes a target with a flurry of attacks. Activate Demon Mode, then continue the offensive to go into Archdemon Mode, which raises attack speed and power.'),
    ('Hammer', 'A blunt weapon used to smash monsters with powerful attacks. It can stun monsters with repeated blows to the head.'),
    ('Lance', 'A weapon coupled with a highly defensive shield. Lance users can block while moving and also counterattack. You can also charge forward with this weapon and perform a Jumping Attack, except in Strike Style.'),
    ('Gunlance', 'A Lance equipped with the ability to fire shells. Has high attack potential thanks to Wyverns Fire and Burst Fire, which uses all of your shells at once.'),
    ('Hunting Horn', 'Perform songs that boost your abilities and those of your friends. Weave your performances into your attacks to make the most of this weapons offensive and support capabilities.'),
    ('Switch Axe', 'Use the mobility and attack power of the Axe, and when you see a chance, switch to the powerful Sword. While in Sword Mode, aim to unleash a powerful Element Discharge.'),
    ('Charge Blade', 'A powerful weapon that morphs between a sword/shield combo and an axe. Accumulate energy with the nimble sword, and then switch to axe mode to unleash a thunderous, energy-filled attack.'),
    ('Insect Glaive', 'The Insect Glaive pairs a powerful glaive with Kinsects: insects that harvest extract from monsters to power you up. The Insect Glaive provides the hunter with great mobility and the ability to perform Jumping Attacks even on flat terrain.'),
    ('Light Bowgun', 'A long range projectile weapon. Utilizes a variety of ammo to do everything everything from rapidly shooting targets to providing support with status-changing ammo. Hit the target at critical range to maximize the weapons full potential. Critical range varies depending on the ammo.'),
    ('Heavy Bowgun', 'A powerful, long range projectile weapon. The heavy weight makes mobility a chore, but the firepower makes up for it. Use Crouching Fire to rapidly chain together shots. Hit the target at critical range to maximize damage Critical range varies depending on the ammo.'),
    ('Bow', 'The Bow is a versatile weapon thanks to its variety of Shots, including the long- ranged Arc Shot and the damaging Power Shot, and allows its user to be highly mobile as they fire off coated arrows as support. Hit the target at critical range to maximize the weapons full potential. Critical range varies depending on the type of arrow or arrow coating used.'),
    ('Prowler', 'Registering a Palico as a Prowler will let you control that Palico directly! Switch between modes via the Palico Board.');
