# Simple Story Laravel Web Application  API

> THis project built with laravel `v.9`

> without any front end

## Database 

### Users Table

|#|Title|Description|
|---|---|---|
|1|name||
|2|email|must be unique|
|3|username|must be unique|
|4|type|default user type is `user`|
|5|avatar|user profile image|
|6|password|

### Categories Table

|#|Title|Description|
|---|---|---|
|1|title|must be unique|

### Stories Table

|#|Title|Description|
|---|---|---|
|1|user_id|users table `Fk`|
|2|category_id|categories table `Fk`|
|3|title|category title|

### Story_likes Table

|#|Title|Description|
|---|---|---|
|1|user_id|users table `Fk`|
|2|story_id|stories table `Fk`|


### Comments Table

|#|Title|Description|
|---|---|---|
|1|user_id|users table `Fk`|
|2|parent_id|used for Replying System|
|3|text|user comment text|
|4|commentable_id|for store stories `fk`|
|1|commentable_type|for store Model Class Name for example => `App\Models|Story`|


### Followers Table

|#|Title|Description|
|---|---|---|
|1|follower_id|(followers) users table `Fk`|
|1|following_id|(following) users table `Fk`|


<a name="loginregister"></a>
## Login / Register :key:

> In This Project Used `Sanctum` Package

- Register Requirements
    1. email :email:
    2. password :old_key:
    3. avatar :blond_haired_man:

<a name="usertype"></a>

## User Types :male_detective:

1. Admin (Administrator)
2. User (Normal user)

> After Seeding Database There will be 2 users type and Categories Dummy Data

|#|email|password|type
|---|---|---|---|
|1|admin@a.b|123456|admin
|2|alireza@a.b|123456|user


<a name="admin"></a>

## Admin :man_technologist:

- Abilities
    1. Create categories
    2. See users
    3. See users with thier Stories
    4. See Single User Story With its Comments

<a name="user"></a>

## User :raising_hand_man:

- user abilities
    1. Create Stories
    2. Send Comment to a Story
    3. Reply To a Comment
    4. Follow Users
    5. See Follower List
    6. See Following List
    7. Like a Story
    8. See All Liked Stories

    5. Seeing own Stories

<a name="home"></a>

## Home Page :derelict_house:

- Home Abilities
    1. See  `10` Latest Users Stories
    2. Show Number Of Comments for Each Story
    3. Show Single Story With its Comments
    4. See a User Stories List
    5. Get Stories By Category
    


## Todo
    
- [ ] Must Implement <b>Edit</b> Section 
- [ ]  Must Implement <b> Delete </b> Section
    
    
