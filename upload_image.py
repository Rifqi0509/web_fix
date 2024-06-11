import requests
import os

# Path ke gambar (gunakan raw string literal untuk path Windows)
image_path = r'C:\Users\Rifqi\Downloads\Downloads\DHT 22.jpg'  # Atau 'D:\\foto\\iot.jpg'

# Periksa apakah file gambar ada
if not os.path.isfile(image_path):
    print("Image file not found at:", image_path)
else:
    print("Image file found at:", image_path)

    # URL endpoint untuk mengunggah gambar
    url = 'https://pantautamupro.framework-tif.com/api/upload-image'
    print("Uploading to URL:", url)

    # Buka file gambar
    with open(image_path, 'rb') as image_file:
        files = {'filename': image_file}

        # Unggah gambar
        response = requests.post(url, files=files)
        print("HTTP status code:", response.status_code)

        # Cek status kode HTTP
        if response.status_code == 200:
            print("Image uploaded successfully.")
            print("Response JSON:", response.json())
        else:
            print("Failed to upload image.")
            # print("Response status code:", response.status_code)
            # print("Response text:", response.text)
