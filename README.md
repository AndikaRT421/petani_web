<p align="center"><b>EF234505 - Knowledge Based System Engineering 2024/2025</b><br>Institut Teknologi Sepuluh Nopember</p>
<br>
<p align="center"><img src="https://i.ibb.co.com/2gLgWws/image.png" style="transform: scale(0.5);"></p>
<br>
<p align="center">Project by <a href="https://github.com/AndikaRT421">Andika</a>, <a href="https://github.com/malvinlh">Malvin</a>, <a href="https://github.com/morisab">Moris</a>, and <a href="https://github.com/RafliRaihanP">Rafli</a></p>

# PETANI - Ecosystem Management of Agricultural Technology with Intellectual Navigation

## 1. Introduction

### Purpose of the Document

This user manual is created to provide an overview and explanation of PETANI, including how users can navigate and use the PETANI website.

### Application Description

"**PETANI - Ecosystem Management of Agricultural Technology with Intellectual Navigation**" is an AI-powered e-commerce website designed to assist the community, especially farmers, in finding affordable farming tools and diagnosing diseases in potato crops.

The platform provides tailored features based on user status:

-   **Partners**:

    -   **Home Page**: Displays monthly sales reports and annual income summaries.
    -   **Add Product**: Allows partners to add new products to their inventory.
    -   **Store Check**: Enables partners to monitor their store's activities and product status.

-   **Users**:
    -   **Home Page**: A landing page for users.
    -   **Shopping**: Enables users to purchase farming equipment.
    -   **Plant Check**: Allows users to diagnose potato plant diseases.
    -   **Ask Emilia**: A virtual AI assistant for agricultural-related inquiries.

### How to run this project

Make sure you have installed npm and composer on your machine. Before running the project you need to start Apache and MySQL server on your machine. You can use XAMPP or WAMP for this purpose. After that, follow these steps:

1. Clone this repository

    `git clone https://github.com/AndikaRT421/petani_web.git`

2. Install the required packages

    `npm install`

    `composer install`

3. Check laravel setup

    `cp .env.example .env`

    `php artisan key:generate`

    `php artisan migrate`

4. Run the project

    `php artisan serve`

    `npm run dev`

## 2. User Manual

### Login Page

After accessing the PETANI website on your device, you will be directed to the login page.

**Login Page**

<div style="display: flex; justify-content: space-between;">
  <img src="https://github.com/user-attachments/assets/01469222-a098-4a1d-9a31-02d3b68ffdf7" alt="user-login" style="width: 45%; margin-right: 5px;">
  <img src="https://github.com/user-attachments/assets/e87efe36-44ba-469b-b717-8af2008212d6" alt="partner-login" style="width: 45%; margin-right: 5px;">
</div>

The login page allows registered users to log in as either a User or a Partner. Unregistered users can choose "Buat Akun" to fill out the registration form below.

**Registration Page**

<div style="display: flex; justify-content: space-between;">
  <img src="https://github.com/user-attachments/assets/21d6801a-fcb5-4074-9ca8-7423bdee2e58" alt="user-register" style="width: 45%; margin-right: 5px;">
  <img src="https://github.com/user-attachments/assets/1c64c785-87ef-4faf-8d41-2abbbd2e3365" alt="partner-register" style="width: 45%; margin-right: 5px;">
</div>

Forgot your password? Select "Lupa Password?" to access the reset form.

**Forgot Password Page**

![Forgot Password Page](https://github.com/user-attachments/assets/6c1789e3-4db9-4067-a00f-b5791597cd18)

---

### Home Page (User)

The user home page includes navigation buttons such as Home, Shopping, Plant Check, and Ask Emilia. Users can view their profile in the top-left corner and their cart in the top-right corner.

**User Home Page**

![User Home Page](https://github.com/user-attachments/assets/747119de-0eb0-4a40-837a-52830a520c03)

---

### Plant Check (User)

The plant check page allows users to upload images of their potato plants. Our AI will then diagnose the disease affecting the plants and provide a result.

**Plant Check Page**

![Plant Check Page](https://github.com/user-attachments/assets/32549e39-fb75-4552-8df9-7499788b09a5)

**Plant Check Results**

![Plant Check Result](https://github.com/user-attachments/assets/df7e97f4-17fe-48a4-b30a-4348147bf61d)

---

### Ask Emilia (User)

The Ask Emilia page provides users with access to a virtual assistant powered by AI, capable of answering agricultural questions and processing uploaded PDF files for better decision-making.

**Ask Emilia Page**

<div style="display: flex; justify-content: space-between;">
  <img src="https://github.com/user-attachments/assets/8eea12b5-64c0-4135-aada-90340db56430" alt="tanya-emilia-1" style="width: 45%; margin-right: 5px;">
  <img src="https://github.com/user-attachments/assets/b4ae48be-b51d-4feb-ba8c-6bd66fcef04c" alt="tanya-emilia-2" style="width: 45%; margin-right: 5px;">
</div>

![Tanya Emilia Result](https://github.com/user-attachments/assets/3c40ee7d-31ba-45c4-b5fd-f88c0f4f4846)

---
