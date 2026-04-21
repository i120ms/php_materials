-- Tworzenie bazy
CREATE DATABASE IF NOT EXISTS galeria;
USE galeria;

-- Tworzenie tabeli
CREATE TABLE obrazy (
    id INT AUTO_INCREMENT PRIMARY KEY,
    miniaturka VARCHAR(255) NOT NULL,
    tytul VARCHAR(100) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    cena DECIMAL(10,2) NOT NULL
);

-- Przykładowe dane
INSERT INTO obrazy (miniaturka, tytul, autor, cena) VALUES
('obraz1.jpg', 'Zachód słońca', 'Jan Kowalski', 199.99),
('obraz2.jpg', 'Góry zimą', 'Anna Nowak', 249.50),
('obraz3.jpg', 'Miasto nocą', 'Piotr Wiśniewski', 179.00),
('obraz4.jpg', 'Morze', 'Katarzyna Zielińska', 220.00),
('obraz5.jpg', 'Las jesienią', 'Michał Lewandowski', 199.00);