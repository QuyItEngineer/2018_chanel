import dotenv from 'dotenv';

const envConfig = dotenv.config();

export const env = (key, defaultValue) => envConfig[key] || defaultValue;
