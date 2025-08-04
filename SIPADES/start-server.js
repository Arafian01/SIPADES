import { execSync } from 'child_process';
import { networkInterfaces } from 'os';

const getLocalIP = () => {
    const interfaces = networkInterfaces();
    for (const name of Object.keys(interfaces)) {
        for (const iface of interfaces[name]) {
            if (iface.family === 'IPv4' && !iface.internal) {
                return iface.address;
            }
        }
    }
    return '0.0.0.0';
};

const ip = getLocalIP();
console.log(`🚀 Laravel Server berjalan di http://${ip}:8000 🎉`);
console.log(`Tekan Ctrl+C untuk menghentikan server`);
execSync(`php artisan serve --host=${ip} --port=8000`, { stdio: 'inherit' });