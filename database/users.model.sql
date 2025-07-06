
CREATE TABLE IF NOT EXISTS users (
    id uuid PRIMARY KEY DEFAULT gen_random_uuid(),
    username VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    address TEXT,
    role VARCHAR(50) DEFAULT 'customer',
    wallet NUMERIC(12, 2) DEFAULT 0.00
);
