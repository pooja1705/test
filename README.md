## Titile
task management app

### Add Features
* Formatting (use  underscore or camelcase for variables, use proper name for variables, format code with proper indentation)

```
camelcase eg, $isLoggedIn, $userIsAuthenticated, $password, $taskDesxription (first letter small then first letter of all english words capital)

underscore eg, $is_logged_in, $user_is_authenticated, $password, $task_description

wrong:

if(condition) 
{
  //anything
}
else
{
  //anything
}

correct:

if(condition) {
  
  //anything
  
} else {
  
  // anythin

}

```

store all the errors in array and then display it, avoid alert

```
$errors = array();
$error = 'this is the first error';
array_push($errors, $error);

$error = 'this is the second error';
array_push = 'this is the second error';

print_r($errors);
Array([0] => this is the first error [1] => this is the second error);

```
new task:

add image upload functionality
share the task with other users (you will have to create a new table for that also)
