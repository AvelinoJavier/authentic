CREATE TABLE users
(
  id INT NOT NULL auto_increment,
  email VARCHAR(320) NOT NULL,
  password CHAR(60) NOT NULL,
  created TIMESTAMP NOT NULL,
  name VARCHAR(64) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE (email),
  UNIQUE (name)
);

CREATE TABLE modules
(
  id INT NOT NULL auto_increment,
  code VARCHAR(50) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE (code)
);

CREATE TABLE roles
(
  id INT NOT NULL auto_increment,
  name VARCHAR(50) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE (name)
);

CREATE TABLE permissions
(
  id INT NOT NULL auto_increment,
  action VARCHAR(50) NOT NULL,
  controller VARCHAR(50) NOT NULL,
  module_id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (module_id) REFERENCES modules(id),
  UNIQUE (action, module_id, controller)
);

CREATE TABLE users_permissions
(
  user_id INT NOT NULL,
  permission_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (permission_id) REFERENCES permissions(id)
);

CREATE TABLE permissions_roles
(
  permission_id INT NOT NULL,
  role_id INT NOT NULL,
  FOREIGN KEY (permission_id) REFERENCES permissions(id),
  FOREIGN KEY (role_id) REFERENCES roles(id)
);