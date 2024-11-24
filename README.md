
## Branches

- **main** - Production branch
- **dev** - Development branch

## Development Setup Instructions

1. **Clone the repository:**
    ```bash
    git clone https://github.com/mabdusshakur/Cooking-Recipes-Blog.git
    ```

2. **Change directory to the project folder:**
    ```bash
    cd Cooking-Recipes-Blog
    ```

3. **Switch to your branch:**
    ```bash
    git checkout <branch-name>
    ```

4. **Verify your branch:**
    ```bash
    git branch
    ```

5. **Install the dependencies:**
    ```bash
    npm install

    composer install
    ```

6. **Create a `.env` file:**
    ```bash
    cp .env.example .env
    ```

> From here, other basic setup instructions are the same as the Laravel project setup.

## Daily Workflow

- **Before starting work, always pull the latest changes from the `dev` branch:**
    ```bash
    git pull origin dev  
    ```

- **Push your changes to your branch only:**
    ```bash
    git push origin <branch-name>
    or
    git push (if you are already on your branch)
    ```

## Contributors' Branches

- **sumi:** `origin/sumi`
- **aisha:** `origin/aisha`
- **shakil:** `origin/shakil`
- **mahfuz:** `origin/mahfuz`
- **shakur:** `origin/shakur`

