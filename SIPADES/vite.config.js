import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { networkInterfaces } from 'os';

const getLocalIP = () => {
    const interfaces = networkInterfaces();
    for (const name of Object.keys(interfaces)) {
        for (const iface of interfaces[name]) {
            if (iface.family === 'IPv4' && !iface.internal) {
                return iface.address; // Misalnya, 10.84.11.76
            }
        }
    }
    return '0.0.0.0';
};

const serverHost = process.env.VITE_SERVER_HOST || getLocalIP();

export default defineConfig({
    server: {
        host: serverHost,
        port: 5173,
        hmr: {
            host: serverHost,
            port: 5173,
        },
        cors: {
            origin: `http://${serverHost}:8000`,
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});