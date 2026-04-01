-- =============================================
-- Experts Dock - Database Setup
-- =============================================

CREATE DATABASE IF NOT EXISTS experts_dock CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE experts_dock;

-- Table: experts
CREATE TABLE IF NOT EXISTS experts (
    id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(150)  NOT NULL,
    linkedin    VARCHAR(300)  NOT NULL,
    email       VARCHAR(150)  NOT NULL,
    experience  TEXT          NOT NULL,
    created_at  DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table: contacts
CREATE TABLE IF NOT EXISTS contacts (
    id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(150)  NOT NULL,
    email       VARCHAR(150)  NOT NULL,
    message     TEXT          NOT NULL,
    created_at  DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table: unsubscribers
CREATE TABLE IF NOT EXISTS unsubscribers (
    id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email       VARCHAR(150)  NOT NULL UNIQUE,
    created_at  DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
