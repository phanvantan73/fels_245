# [Framgia E-Learning System]
## [Home]
User
- can see her summary (follow, the number of words she memorised, etc.)
- can see the buttons "Word List" and "Start Lesson"
- can see activities (her's and following users)
- can authenticate via Facebook, Twitter, Google

## [Profile]
User
- can see profile

## [Profile(edit)]
User
- can update Name, Email, Password, Avatar

## [Word List]
User
- can see word list
- can filter the list by some conditions (e.g. learned, unlearned, alphabet, category)
- can see which word she has already learned.

## [Categories]
User
- can choose a course she learns from some courses.

## [Lesson]
User
- can solve the problems (by selecting)
- can see the correct answer when she answer a question.
- can see the progress in the lesson (e.g. "3/20")

## [Result]
User
- can see the result of a lesson.

## [Admin]
Admin User
- can manage all data


# Step by step
1. Design database
2. Add tasks on redmine + estimate time
3. Init project
4. Init models, add relationship
5. Design static pages
6. Signup / Login / Logout
7. Other pulls

# Step to update task on redmine
1. Change Status to "In Progress", "Due date"
2. Update  "Spent time", "% Done (100)",  before send pull request to trainer 
3. If trainer COMMENT, change "% Done (80)", after that continue to fix comment; if not, move to step 4
4. After MERGED, update task infomation "spent time", "% Done (100)", Status to "Resolved" 

# Notice: 
Trừ pull init project và init model, các pull khác không quá 15 files thay đổi
Các bạn trong team review chéo cho nhau + comment OK vào pull sau khi review xong mà không có lỗi nào

# [Framgia Coding Standard PHP]
https://github.com/framgia/coding-standards/tree/master/vn/php

# PHP-Code-Sniffer check code convention with Sublime Text 
1. https://gist.github.com/tuanpht/98da682333dd1bc8e4516417653158aa 
2. https://github.com/wataridori/framgia-php-codesniffer
