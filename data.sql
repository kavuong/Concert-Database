INSERT INTO dbprj_events (event_id, name, venue, schedule) VALUES (1,'UC Davis Symphony Orchestra: Scheherazade','Jackson Hall','2018-06-04 20:00');
INSERT INTO dbprj_events (event_id, name, venue, schedule) VALUES (2,'San Francisco Symphony: Mahler’s 3rd','Davies Symphony Hall','2018-06-18 21:30');
INSERT INTO dbprj_events (event_id, name, venue, schedule) VALUES (3,'National Day Concert: Butterfly Lovers and Long March','Hong Kong Cultural Centre','2018-09-28 23:00');
INSERT INTO dbprj_events (event_id, name, venue, schedule) VALUES (4,'The Late Late Show with James Corden','HK City Hall Concert Hall','2018-10-23 23:30');
INSERT INTO dbprj_events (event_id, name, venue, schedule) VALUES (5,'TEDxHKU','Rayson Huang Theatre','2018-10-27 11:00');
INSERT INTO dbprj_events (event_id, name, venue, schedule) VALUES (6,'Celtics @ Kings: NBA Finals Game 7','Golden One Center','2019-06-18 19:00');

INSERT INTO dbprj_concerts (event_id, musicians) VALUES (1,'Yo-Yo Ma');
INSERT INTO dbprj_concerts (event_id, musicians) VALUES (2,'James Galway');
INSERT INTO dbprj_concerts (event_id, musicians) VALUES (3,'Lindsay Sterling');

INSERT INTO dbprj_talks (event_id, staff) VALUES (4,'Jack Hanks');
INSERT INTO dbprj_talks (event_id, staff) VALUES (5,'Aaron Borland');

INSERT INTO dbprj_instruments (event_id, instrument) VALUES (1,'Cello');
INSERT INTO dbprj_instruments (event_id, instrument) VALUES (2,'Flute');
INSERT INTO dbprj_instruments (event_id, instrument) VALUES (2,'Clarinet');
INSERT INTO dbprj_instruments (event_id, instrument) VALUES (3,'Piano');
INSERT INTO dbprj_instruments (event_id, instrument) VALUES (3,'Marimba');
INSERT INTO dbprj_instruments (event_id, instrument) VALUES (3,'Trumpet');

INSERT INTO dbprj_equipments (event_id, equipment) VALUES (4,'Sofa');
INSERT INTO dbprj_equipments (event_id, equipment) VALUES (5,'Projector');


INSERT INTO dbprj_concerts_parts (event_id, part_no, pic) VALUES (1,1,'Chad Hennington');
INSERT INTO dbprj_concerts_parts (event_id, part_no, pic) VALUES (1,2,'James Young');
INSERT INTO dbprj_concerts_parts (event_id, part_no, pic) VALUES (1,3,'Steve Griffin');
INSERT INTO dbprj_concerts_parts (event_id, part_no, pic) VALUES (2,1,'Mark Holmes');
INSERT INTO dbprj_concerts_parts (event_id, part_no, pic) VALUES (2,2,'Melinda Jones');
INSERT INTO dbprj_concerts_parts (event_id, part_no, pic) VALUES (2,3,'Sherry Matwick');

INSERT INTO dbprj_artists (artist_id, name, gender) VALUES (1,'Ashley Chandler','female');
INSERT INTO dbprj_artists (artist_id, name, gender) VALUES (2,'Sandra Anderson','female');
INSERT INTO dbprj_artists (artist_id, name, gender) VALUES (3,'Scott Robertson','male');

INSERT INTO dbprj_performs(artist_id, event_id) VALUES (1,1);
INSERT INTO dbprj_performs(artist_id, event_id) VALUES (2,2);
INSERT INTO dbprj_performs(artist_id, event_id) VALUES (3,3);
INSERT INTO dbprj_performs(artist_id, event_id) VALUES (1,4);
INSERT INTO dbprj_performs(artist_id, event_id) VALUES (2,5);
INSERT INTO dbprj_performs(artist_id, event_id) VALUES (3,6);
INSERT INTO dbprj_performs(artist_id, event_id) VALUES (2,1);






