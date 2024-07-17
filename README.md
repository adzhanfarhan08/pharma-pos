# Pharma Pos v0.5.6 (Non-Release)

This is a website created based on the needs of pharmacy drug sales.
## Tech Stack

**Client:** PHP, TailwindCSS

**Database:** MySQL
## Installation

## 1. PHP
- Download and Install XAMPP

## 2. Tailwind CSS

- Download and Install Node JS

Following command

```bash
npm install -D tailwindcss
npx tailwindcss init
```

- Configure tailwind.config.js
```
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}"],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

- Add the Tailwind directives to your CSS
```
@tailwind base;
@tailwind components;
@tailwind utilities;
```
