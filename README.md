# Local CMS Project Management Dashboard

A simple PHP dashboard to manage and access your local WordPress and PrestaShop projects. The dashboard provides an easy way to navigate between different projects, access admin panels, and open projects in VS Code.

## Features

- Clean, modern interface for managing multiple CMS projects
- Support for WordPress and PrestaShop projects
- Quick access to project front-end, admin panels, and VS Code
- Project search functionality
- Direct link to phpMyAdmin
- PHP info viewer
- Responsive design

## Setup

1. Clone the repository into your local server directory (e.g., `htdocs`):
```bash
git clone https://github.com/mohamed-dabach/cms_dashboard
```

2. Create the required directory structure:
```
http://localhost/cms_dashboard/
cms_dashboard/
├── index.php
├── prestashop/
└── wordpress/

Or if you want to access the dashboard directly in localhost/ follow this structuer

http://localhost/
htdocs/
├── index.php
├── prestashop/
└── wordpress/
```

3. Move your existing WordPress projects into the `wordpress` directory and PrestaShop projects into the `prestashop` directory.

4. Access the dashboard through your local server:
```
http://localhost/ or http://localhost/cms_dashboard
```

## Directory Structure

```
cms_dashboard/ (or directly in htdocs/)
├── index.php
├── prestashop/
│   ├── project1/
│   ├── project2/
│   ├── project3/
│   └── project4/
└── wordpress/
    ├── project1/
    ├── project2/
    ├── project3/
    └── project4/
```

## Requirements

- PHP enabled web server (Apache/Nginx)
- Local WordPress/PrestaShop installations
- VS Code (for IDE integration)
- xampp

## Usage

- Click on "WP" or "PS" tabs to switch between WordPress and PrestaShop projects
- Use the search bar to filter projects by name
- Click on project names to view the front-end
- Use "WP Admin" or "PS Admin" links to access admin panels
- Click "VS Code" to open the project in Visual Studio Code
- Access phpMyAdmin directly through the dashboard
- View PHP configuration through the PHP Info tab

## Notes

- Ensure your web server has proper permissions to read the project directories
- The VS Code integration requires the VS Code protocol handler to be installed on your system
