# NexCRM with Stripe Payment Integration (Laravel)

A production-style **Customer Relationship Management (CRM)** system built with Laravel, featuring deal tracking, customer management, and secure payment integration using Stripe.

---

## Demo

- Login → Create Customer → Create Deal → Pay via Stripe → Dashboard updates

## Overview

This project demonstrates a full-stack CRM workflow:

* Manage customers and deals
* Track deal lifecycle (pending → won/lost)
* Process payments via Stripe Checkout
* Visualize business metrics through dashboard analytics

---

## Features

### Customer Management

* Create and edit customers
* Search customers (name, email, phone)
* Pagination and clean UI

### Deal Management

* Create, edit, and track deals
* Status management (Pending, Won, Lost)
* Filter deals by status
* Search deals by title

### Payment Integration (Stripe)

* Stripe Checkout integration
* Payment success & cancel handling
* Deal status updated on payment
* Test mode supported

### Dashboard

* Total customers, deals, revenue
* Revenue chart (monthly aggregation)

### Filtering & Search

* Server-side filtering (scalable)
* Combined filters (status + search)
* Persistent query params across pagination

---

## Tech Stack

* **Backend:** Laravel (PHP)
* **Frontend:** Blade + Tailwind CSS
* **Database:** MySQL
* **Payments:** Stripe Checkout
* **Charts:** Chart.js

---

## Architecture

* MVC pattern (Laravel)
* Relational DB design:

```text
Customers → Deals → Payments
```

* Clean separation of concerns:

  * Controllers → business logic
  * Models → data relationships
  * Views → UI rendering

---

## Key Relationships

* A Customer has many Deals
* A Deal belongs to a Customer
* A Deal has many Payments

---

## Payment Flow

1. User clicks **Pay Now**
2. Redirected to Stripe Checkout
3. On success:

   * User redirected back
   * Deal marked as **won**
4. On cancel:

   * User returned without changes

> Note: Webhooks can be added for production-grade verification.

---

## Installation

### 1. Clone Repository

```bash
git clone https://github.com/your-username/crm-system.git
cd crm-system
```

---

### 2. Install Dependencies

```bash
composer install
npm install && npm run build
```

---

### 3. Setup Environment

```bash
cp .env.example .env
php artisan key:generate
```

Update `.env`:

```env
DB_DATABASE=crm_db
DB_USERNAME=root
DB_PASSWORD=yourpassword

STRIPE_KEY=your_stripe_key
STRIPE_SECRET=your_stripe_secret
```

---

### 4. Run Migrations & Seed

```bash
php artisan migrate --seed
```

---

### 5. Start Server

```bash
php artisan serve
```

---

## Stripe Test Card

Use this test card:

```text
4242 4242 4242 4242
Any future date
Any CVV
```

---

## Project Structure

```text
app/
 ├── Models/
 │   ├── Customer.php
 │   ├── Deal.php
 │   └── Payment.php
 ├── Http/Controllers/
 │   ├── CustomerController.php
 │   ├── DealController.php
 │   └── PaymentController.php

resources/views/
 ├── customers/
 ├── deals/
 └── dashboard.blade.php
```

---

## Design Decisions

* No delete for deals → preserves financial data
* Status-based workflow (won/lost)
* Server-side filtering for scalability
* Stripe success callback used (webhook recommended for production)

---

## Future Improvements

* Stripe Webhooks for secure payment verification
* Role-based access (Admin / Sales)
* Export reports (CSV/PDF)

---

## Screenshots

* Dashboard with analytics
* Deals listing with filters
* Stripe Checkout payment flow

---

## Key Learnings

* Payment gateway integration (Stripe)
* RESTful API design in Laravel
* Query optimization with filtering
* UX improvements with Tailwind

---

## Author

**Sayan Debnath**
Full Stack Engineer

---
