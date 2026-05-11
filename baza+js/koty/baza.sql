CREATE TABLE kandydaci (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imie VARCHAR(50),
    wiek INT,
    zdjecie VARCHAR(100)
);

INSERT INTO kandydaci(imie, wiek, zdjecie) VALUES
('Mruczek', 2, 'kot1.gif'),
('Filemon', 4, 'kot2.gif'),
('Puszek', 1, 'kot3.gif');
