## Development Branch

<<<<<<< HEAD
> The development branch is intended for testing new features and bug fixes. It is not recommended for production use as it may contain bugs or incomplete features. For a stable version, please use the `main` branch.
=======
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
<<<<<<< HEAD
    git checkout aisha
=======
    git checkout shakil
>>>>>>> shakil
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
<<<<<<< HEAD
    git push origin aisha
=======
    git push origin shakil
>>>>>>> shakil
    or
    git push (if you are already on your branch)
    ```

## Things to Do After You Finish a Task

### Creating a Pull Request

1. **Navigate to the repository on GitHub.**
2. **Click on the `Pull requests` tab.**
3. **Click the `New pull request` button.**
4. **Set the `dev` branch as the base branch.**
5. **Set your branch as the compare branch.**
6. **Click the `Create pull request` button.**
7. **Provide a title and description for the pull request.**
8. **Click the `Create pull request` button again.**

> **Note:** Ensure your branch is up to date with the `dev` branch before creating a pull request.
> 
> **Note:** Do not merge your pull request; it should be reviewed and merged by someone else.

## Contributors' Branches

<<<<<<< HEAD
- **aisha:** `origin/aisha`


=======
- **shakil:** `origin/shakil`
>>>>>>> shakil

## Commit Message Guidelines

- **Add, <your message>** - When adding a new feature or functionality
- **Update, <your message>** - When updating an existing feature or functionality
- **Fix, <your message>** - When fixing a bug
- **Refactor, <your message>** - When refactoring code, means changing the code without changing its behavior
- **Remove, <your message>** - When removing a feature or functionality
- **Test, <your message>** - When adding or updating tests
- **Docs, <your message>** - When adding or updating documentation
>>>>>>> aisha
