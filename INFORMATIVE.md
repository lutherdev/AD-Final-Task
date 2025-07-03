## ROLES:
- Leader: Luther
- Database: Ping
- Frontend: Cj
- Backend: Luther

## Project
- Type: Store
- Name: Mining Minor
- Theme: Medieval
- Tech: html, css, javascript, [tailwindcss, bootstrap], postgredb, php, 
- 

## QUESTIONS
- How many pages
- May tinuro na dalawang database, do we have to make use of both? or pedeng isa lang
- Does everything have to work? Like sa store, dapat makaka order? with add to cart, forms
- Ung data po ba dapat napapasa sa ibat ibang devices? like from pc ko to another pc? or just create static data?

## FLOW
- LOGIN PAGE
- |          \
- CUSTOMER   ADMIN 
- |
- Home
- |
- Home Button (Logo) | Store | About us | Services | Location

1. Login Page, prompt the user for their account / Register if none?
2. The input passed to auth utility? to determine if in database, fetch data from database to apply logic if admin or not
3. Page proceeds to dependency, navbar is versatile
4. Each page is controlled by a utility called pageMaker where it accepts parameter of content, title, css?, 
- -it also fix, calling the component? handler? of navbar and footer
- -where does content come from? which file


## DATABASE FLOW
1. Does it have save data? (question number 4)
2. Seed the database before php (for accounts, store)
3. LOGIN: When user logs in, check for the username using select
4. REGISTER: When user register, logic first if valid inputs, check if user exists, insert to table, 
5. SEEDING STORE: When loading page store, just select the existing data
6.   

## CHANGES TO DOCKER FILE, DOCKER YAML, DATABASE TABLE COLUMNS,
- Docker: do docker compose down -v (this removes the existing volume)
- Database: drop the table (para madelete ung table to create the bago)

## RUNNING THE APP
1. Local using xampp httdocs
2. Docker
3. php -S localhost:8000

## How To Branching
1. Clone the most updated github repo
2. Create a branch by: git checkout -b feature/member1-task (eto ung name ng branch) (checkout: view the branch | -b : create branch)
3. Make changes then commit
4. To swap between branches, git checkout <name ng branch>
5. push your branch to github: git push -u origin feature/member1-task
6. Create a pull request by: Going to the repo, click pull request, choose master and your branch for compare and request merge, create, wait for review 

- How to undo COMMIT only to change commit message: git reset --soft HEAD~1 (this will put that sht back to staging)
- How to delete last commit including code: git reset --hard HEAD~1
- 
MAIN GitHub repo
 └── Team Members clone
      └── Create feature branches (local)
            └── Commit changes
                  └── Push branch to GitHub
                        └── Pull Request → Merge to main

## QUESTIONS
- So if we 

## How to Pull Request

## Logics
