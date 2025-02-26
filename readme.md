# Wardrobe Management System

A full-stack application for managing your clothing items, built with Vue 3 and Laravel 11.

## Features

- **User Authentication**: Secure login and registration system
- **Clothing Management**: Add, edit, and delete clothing items
- **Categorization**: Organize items by category (tops, bottoms, shoes, etc.)
- **Search & Filter**: Easily find items in your wardrobe
- **Responsive Design**: Works on desktop and mobile devices
- **Outfit Creation**: Combine items to create and save outfits
- **Seasonal Organization**: Tag items by season for better planning
- **Image Upload**: Add photos of your clothing items
- **Wardrobe Analytics**: View statistics about your clothing collection

## Technologies Used

### Frontend
- Vue 3 (Composition API)
- Vue Router for navigation
- Pinia for state management
- Tailwind CSS for styling

### Backend
- Laravel 11
- Laravel Sanctum for API authentication
- SQLite database

## Prerequisites

- Node.js (v16 or higher)
- PHP (v8.1 or higher)
- Composer
- SQLite

## Installation

### Backend Setup

1. Clone the repository:
   ```bash
   git clone https://github.com/PierreMano/wardrobe.git
   cd wardrobe-management/backend
   ```

2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Create a copy of the environment file:
   ```bash
   cp .env.example .env
   ```

4. Generate an application key:
   ```bash
   php artisan key:generate
   ```

5. Configure the database in the `.env` file:
   ```
   DB_CONNECTION=sqlite
   DB_DATABASE=absolute/path/to/database.sqlite
   ```

6. Create an empty SQLite database file:
   ```bash
   touch database/database.sqlite
   ```

7. Run database migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```

8. Start the development server:
   ```bash
   php artisan serve
   ```

### Frontend Setup

1. Navigate to the frontend directory:
   ```bash
   cd ../frontend
   ```

2. Install JavaScript dependencies:
   ```bash
   npm install
   ```

3. Configure the API endpoint in `.env`:
   ```
   VITE_API_URL=http://localhost:8000/api
   ```

4. Start the development server:
   ```bash
   npm run dev
   ```

## Authentication Process

### Registration
1. Users can create a new account by providing:
   - Full name
   - Email address
   - Password (minimum 8 characters)
   - Password confirmation
2. After successful registration, users will receive a verification email
3. Once verified, users can log in to access the system

### Login Process
1. Users can log in using their email and password
2. The system uses Laravel Sanctum to authenticate API requests
3. Authentication tokens are stored securely in HTTP-only cookies
4. Sessions automatically expire after 24 hours of inactivity
5. Failed login attempts are rate-limited for security

### Password Reset
1. Users can request a password reset via the "Forgot Password" link
2. A secure reset link is sent to the user's email
3. The reset link expires after 60 minutes

## Clothing Item Management

### Adding Items
1. Navigate to "My Wardrobe" section
2. Click on "Add New Item"
3. Fill in the required fields:
   - Item name
   - Category
   - Color
   - Brand (optional)
   - Purchase date (optional)
   - Price (optional)
4. Upload an image of the item
5. Add any additional tags or notes
6. Click "Save Item"

### Editing and Deleting
1. From the wardrobe view, select any item
2. Click "Edit" to modify details or "Delete" to remove the item
3. Confirm any deletion to prevent accidental removals

### Categorization System
Items can be organized by:
- Type (tops, bottoms, outerwear, shoes, accessories)
- Subcategory (t-shirts, blouses, jeans, dress pants, etc.)
- Season (spring, summer, fall, winter)
- Occasion (casual, work, formal, athletic)
- Custom tags

## Outfit Creation
1. Go to the "Outfits" section
2. Click "Create New Outfit"
3. Select items from your wardrobe to combine into an outfit
4. Name and save the outfit
5. Add notes or occasion tags

## Search and Filter Functionality
1. Use the search bar to find items by name, brand, or description
2. Apply filters to narrow down results by:
   - Category
   - Color
   - Season
   - Recently added
   - Favorites

## API Endpoints

The backend exposes the following RESTful API endpoints:

### Authentication
- `POST /api/register` - Register a new user
- `POST /api/login` - Log in and get authentication token
- `POST /api/logout` - Log out and invalidate token
- `POST /api/password/email` - Send password reset link
- `POST /api/password/reset` - Reset password

### Clothing Items
- `GET /api/items` - Get all clothing items
- `GET /api/items/{id}` - Get a specific item
- `POST /api/items` - Create a new item
- `PUT /api/items/{id}` - Update an existing item
- `DELETE /api/items/{id}` - Delete an item

### Categories
- `GET /api/categories` - Get all categories
- `POST /api/categories` - Create a new category

### Outfits
- `GET /api/outfits` - Get all outfits
- `GET /api/outfits/{id}` - Get a specific outfit
- `POST /api/outfits` - Create a new outfit
- `PUT /api/outfits/{id}` - Update an outfit
- `DELETE /api/outfits/{id}` - Delete an outfit

## Security Features
- CSRF protection
- XSS prevention
- Rate limiting on authentication attempts
- Input validation
- Secure password hashing

## Mobile Responsiveness
The application is fully responsive and optimized for:
- Desktop browsers
- Tablets
- Mobile phones

## License
This project is licensed under the MIT License - see the LICENSE file for details.

## Contributing
Contributions are welcome! Please feel free to submit a Pull Request.
