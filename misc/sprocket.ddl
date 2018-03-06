create database sprocket_db;

use sprocket_db;

create table sprocket (
  id varchar(10) not null,
  name varchar(50) not null,
  description varchar(500) not null,
  price DOUBLE(6,2)
);

insert into sprocket (id, name, description, price)
    values
      ('25B9' ,'Roller Chain Sprocket', 'Chain Pitch;#25 | Teeth;9 | Configuration;Standard Hub | Material;Steel | Bore Size;0.25 inch',
       3.89),
      ('36GA18', 'Fixed Bore Roller Chain Sprocket', 'Fixed Bore Roller Chain Sprocket, For Industry Chain Size: 35, 11 Number of Teeth',
       8.95),
      ('1334A', '2-Pc. Split Rim, Hub, 60T Sprocket Wheel Assembly',
       'Use #35 chain. Fixed hub/two-piece wheel with tube. Complete pneumatic assembly with ball bearings. 2-piece rim with 3/4in. bore. For speeds up to 20 mph. For use on mini-bikes, go-karts, lawn equipment and hand trucks.',
       95.99),
      ('6AGR4Z' ,'Chain Coupling Sprocket', 'Chain Coupling Sprocket,Bore 1 In', 39.99);

select * from sprocket;

