ALTER TABLE `nagios_cgi_configuration`
  ADD `authorized_for_read_only` VARCHAR(255),
  ADD `color_transparency_index_r` INTEGER,
  ADD `color_transparency_index_g` INTEGER,
  ADD `color_transparency_index_b` INTEGER,
  ADD `result_limit` INTEGER;

REPLACE INTO `label`(section, name, label)  VALUES('nagios_cgi_desc', 'authorized_for_read_only', 'A comma-delimited list of usernames that have read-only rights in the CGIs. This will block any service or host commands normally shown on the extinfo CGI pages. It will also block comments from being shown to read-only users.');
REPLACE INTO `label`(section, name, label)  VALUES('nagios_cgi_desc', 'color_transparency_index', 'These options set the r,g,b values of the background color used the statusmap CGI, so normal browsers that can''t show real png transparency set the desired color as a background color instead (to make it look pretty). Defaults to white: (R,G,B) = (255,255,255).');
REPLACE INTO `label`(section, name, label)  VALUES('nagios_cgi_desc', 'result_limit', 'The number of services being shown in Nagios at the same time.');