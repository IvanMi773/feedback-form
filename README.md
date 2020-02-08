# feedback-form
test task for the company Web-Systems solutions

> to start use this site create folder **img** in public directory

If you get errror something like *Fatal error: require_once(): Failed opening required 'HTML/Common.php' (include_path='D:\xampp\php\PEAR') in D:\xampp\php\pear\Table.php on line 68*.

create .htaccess file and paste this line
> php_value include_path '.;{path_to_PEAR};{path_to_project}'
