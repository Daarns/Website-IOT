# IoT Vokasi - Web Monitoring System
![image](https://github.com/user-attachments/assets/3bcce836-fad8-46ba-8ec0-aacc9e3d5e5a)

## About
Website monitoring sistem IoT yang digunakan untuk memantau dan menampilkan data sensor secara real-time dari perangkat ESP32. Website ini menyediakan dashboard untuk visualisasi data sensor suhu, kelembaban, dan jarak dengan tampilan grafik dan gauge meter interaktif.

## Features
- **Real-time Monitoring**: Memantau data sensor suhu, kelembaban, dan jarak secara langsung
- **Interactive Dashboard**: Dashboard dengan card widgets, grafik area chart, dan gauge meter
- **Data Management**: Penyimpanan dan pengelolaan data sensor dalam database MySQL
- **Data Tables**: Menampilkan riwayat data sensor dalam format tabel yang mudah dibaca
- **User Management**: Sistem login/register untuk akses dashboard
- **Responsive Design**: Antarmuka yang responsif untuk akses desktop dan mobile

## Hardware Requirements
- **ESP32 Microcontroller**
- **DHT22 Sensor** - Untuk membaca suhu dan kelembaban
- **HC-SR04 Ultrasonic Sensor** - Untuk mengukur jarak
- **Breadboard dan Kabel Jumper**
- **WiFi Connection**

## Software Requirements
- **XAMPP/WAMP/LAMP** - Web server dengan MySQL
- **PHP 7.4+** 
- **MySQL Database**
- **Arduino IDE** - Untuk programming ESP32
- **DHT Sensor Library** - Library untuk sensor DHT22

## Wiring Diagram
```
ESP32 Connections:
- DHT22: Pin 15
- HC-SR04 Trigger: Pin 4
- HC-SR04 Echo: Pin 5
- VCC: 3.3V/5V
- GND: Ground
```

## Database Structure
```sql
-- Database: project_iot_vokasi

-- Table untuk data suhu dan kelembaban
CREATE TABLE tabel_sensor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    suhu FLOAT,
    kelembaban INT,
    tglwaktu TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table untuk data sensor jarak
CREATE TABLE tampung_data_device (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_alat VARCHAR(100),
    keterangan_alat VARCHAR(100),
    nilai FLOAT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table untuk user management
CREATE TABLE user (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100),
    username VARCHAR(50),
    password VARCHAR(255),
    status VARCHAR(50)
);
```

## Installation

### 1. Clone Repository
```bash
git clone https://github.com/Daarns/Website-IOT.git
cd Website-IOT
```

### 2. Setup Web Server
- Install XAMPP/WAMP/LAMP
- Move project folder to `htdocs` directory
- Start Apache dan MySQL services

### 3. Database Setup
- Create database `project_iot_vokasi`
- Import database structure atau buat manual sesuai struktur di atas
- Update database connection di `koneksi/koneksi.php`:
```php
$koneksi = mysqli_connect("localhost", "root", "", "project_iot_vokasi");
```

### 4. ESP32 Setup
- Install Arduino IDE
- Install ESP32 board package
- Install required libraries:
  - DHT sensor library
  - WiFi library (built-in)
  - HTTPClient library (built-in)

### 5. Upload ESP32 Code
- Update WiFi credentials dalam kode ESP32:
```cpp
const char* ssid = "Your_WiFi_SSID";
const char* password = "Your_WiFi_Password";
const char* server = "Your_Server_IP"; // IP komputer yang menjalankan web server
```

## API Endpoints

### Data Input (dari ESP32)
- **POST** `/kirimdata.php` - Menerima data suhu dan kelembaban
  - Parameters: `suhu`, `kelembaban`
- **POST** `/api_jarak.php` - Menerima data jarak
  - Parameters: `nama_alat`, `keterangan_alat`, `nilai`

### Web Pages
- `/login.php` - Halaman login
- `/register.php` - Halaman registrasi
- `/index.php` - Dashboard utama
- `/tabel_sensorsuhu_lembab.php` - Tabel data suhu & kelembaban
- `/tabels_sensorjarak.php` - Tabel data sensor jarak
- `/tabel_pengguna.php` - Tabel data pengguna

## Running The Application

### 1. Start Web Server
```bash
# Start XAMPP
sudo /opt/lampp/lampp start

# Or start individual services
sudo systemctl start apache2
sudo systemctl start mysql
```

### 2. Access Website
Open browser and navigate to:
```
http://localhost/Website-IOT/
```

### 3. Default Login
Create account through registration page or insert user data directly to database.

## How It Works

1. **ESP32 Data Collection**: ESP32 membaca data dari sensor DHT22 (suhu/kelembaban) dan HC-SR04 (jarak)
2. **Data Transmission**: Data dikirim ke server melalui WiFi menggunakan HTTP requests
3. **Server Processing**: Server menerima data melalui PHP endpoints dan menyimpan ke MySQL
4. **Real-time Display**: Dashboard menampilkan data terbaru dengan auto-refresh
5. **Data Visualization**: Data ditampilkan dalam bentuk:
   - Card widgets untuk nilai terkini
   - Google Charts untuk gauge meter
   - Chart.js untuk grafik area
   - DataTables untuk tabel data

## File Structure
```
iot-vokasiub/
├── index.php                 # Dashboard utama
├── login.php                 # Halaman login
├── register.php              # Halaman registrasi
├── kirimdata.php             # API endpoint untuk data DHT22
├── api_jarak.php             # API endpoint untuk data jarak
├── koneksi/
│   └── koneksi.php           # Database connection
├── css/                      # CSS files
├── js/                       # JavaScript files
├── vendor/                   # Third-party libraries
└── img/                      # Images
```

## Troubleshooting

### ESP32 Issues
- **Compilation Error**: Install DHT sensor library melalui Library Manager
- **WiFi Connection**: Pastikan credentials WiFi benar
- **Server Connection**: Pastikan IP server dan endpoint URL benar

### Web Issues
- **Database Error**: Periksa koneksi database di `koneksi/koneksi.php`
- **Page Not Loading**: Pastikan Apache service running
- **No Data Display**: Periksa apakah ESP32 berhasil mengirim data

## Contributing
1. Fork the repository
2. Create feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Open Pull Request

## License
This project is licensed under the MIT License.

## Contact
- **Developer**: Sistem IoT Vokasi Team
- **Year**: 2023
- **Purpose**: Educational/Vocational Training

---
**Note**: Pastikan semua dependencies dan libraries terinstall dengan benar sebelum menjalankan sistem.
