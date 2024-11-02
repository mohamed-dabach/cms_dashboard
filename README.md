# Project Structure

## README.md

````markdown
# Dev Projects Dashboard

A clean and modern dashboard to manage your local WordPress and PrestaShop development projects. Easily access your projects, phpMyAdmin, and development environments from a single interface.

## Features

- 🎯 Clean and modern interface
- 🎨 Responsive design
- 💻 Quick access to VS Code
- 🔄 WordPress and PrestaShop support
- 🛠 Direct admin panel access
- 📊 Project last modified dates
- 🔗 PhpMyAdmin integration

## Requirements

- PHP 7.4 or higher
- Local WordPress and/or PrestaShop installations
- VS Code (optional, for IDE integration)

## Installation

1. Clone this repository:
   ```bash
   git clone https://github.com/yourusername/dev-projects-dashboard.git
   ```
````

2. Copy `config.example.php` to `config.php` and update the paths:

   ```bash
   cp config.example.php config.php
   ```

3. Configure your paths in `config.php`

4. Place the files in your local development server directory

## Configuration

Edit `config.php` to set your project paths:

```php
$base_paths = [
    'wordpress' => '/path/to/wordpress/projects',
    'prestashop' => '/path/to/prestashop/projects'
];

$base_urls = [
    'wordpress' => 'http://localhost/wordpress/',
    'prestashop' => 'http://localhost/prestashop/'
];
```

## Usage

1. Access the dashboard through your local development server
2. Switch between WordPress and PrestaShop projects using the navigation tabs
3. Click on project names to open them in your browser
4. Use VS Code button to open projects in Visual Studio Code
5. Access admin panels directly using the admin links

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

````

## config.example.php
```php
<?php
// Configuration
$base_paths = [
    'wordpress' => __DIR__ . '/wordpress',
    'prestashop' => __DIR__ . '/prestashop'
];

$base_urls = [
    'wordpress' => './wordpress/',
    'prestashop' => './prestashop/'
];
````

## .gitignore

```
# Configuration
config.php

# IDE files
.idea/
.vscode/

# OS generated files
.DS_Store
.DS_Store?
._*
.Spotlight-V100
.Trashes
ehthumbs.db
Thumbs.db
```

## LICENSE

```
MIT License

Copyright (c) 2024 [Your Name]

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```
