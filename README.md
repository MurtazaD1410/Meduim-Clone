# Medium Clone
A full-featured blogging platform inspired by Medium, built with Laravel. Create, publish, and discover engaging stories with a clean, distraction-free reading experience featuring rich text editing, user profiles, and social engagement tools.

## ✨ Features
* **Draft System**: Save drafts and publish when ready.
* **Article Categories**: Organize content with tags and categories.
* **Featured Images**: Eye-catching cover images for articles.
* **SEO Optimization**: Meta descriptions, slugs, and optimized URLs.
* **User Profiles**: Customizable author profiles with bio and avatar.
* **Follow System**: Follow favorite authors and get updates.
* **Like System**: Appreciate articles with Medium-style likes.
* **Reading Time**: Estimated reading duration for each article.
* **Home Feed**: Personalized article recommendations.
* **Trending Articles**: Discover popular content.
* **Search Functionality**: Find articles by title, content, or tags.

## 🚀 Tech Stack
* **Framework**: Laravel 12+
* **Language**: PHP 8.4+
* **Database**: Sqlite
* **Authentication**: Breeze
* **Templating**: Blade templates
* **Styling**: Tailwind CSS
* **JavaScript**: Alpine.js
* **Image Processing**: Spatie
* **Storage**: Local

## 📦 Installation
### Prerequisites
* PHP 8.4 or higher
* Composer
* Node.js & npm

### Setup
1. **Clone the repository**
```bash
git clone https://github.com/MurtazaD1410/Meduim-Clone.git
cd Meduim-Clone
```

2. **Install PHP dependencies**
```bash
composer install
```

3. **Install Node dependencies**
```bash
npm install
```

4. **Environment configuration**
Copy the example environment file and update it with your keys:
```bash
cp .env.example .env
```
Then open `.env` and update the values. Example:
```env
APP_NAME="Medium Clone"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=medium_clone
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null

# AWS S3 (Optional for file storage)
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

# Redis (Optional for caching)
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
```

5. **Generate application key**
```bash
php artisan key:generate
```

6. **Run database migrations**
```bash
php artisan migrate
```

7. **Seed the database** (optional)
```bash
php artisan db:seed
```

8. **Create storage symlink**
```bash
php artisan storage:link
```

9. **Build frontend assets**
```bash
npm run build
# or for development
npm run dev
```

10. **Start the development server**
```bash
php artisan serve
```

11. **Open your browser**
```text
http://localhost:8000
```

⭐ If you found this project helpful, please give it a star on GitHub!
