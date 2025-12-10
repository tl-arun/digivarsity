-- University Images Dump
-- This SQL file adds/updates universities with their logos

-- Oxford University
INSERT INTO `universities` (`name`, `logo`, `description`, `location`, `website`, `is_active`, `created_at`, `updated_at`)
VALUES (
    'Oxford University',
    'https://upload.wikimedia.org/wikipedia/commons/thumb/f/ff/Oxford-University-Circlet.svg/300px-Oxford-University-Circlet.svg.png',
    'The University of Oxford is a collegiate research university in Oxford, England.',
    'Oxford, United Kingdom',
    'https://www.ox.ac.uk',
    1,
    NOW(),
    NOW()
)
ON DUPLICATE KEY UPDATE
    `logo` = 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/ff/Oxford-University-Circlet.svg/300px-Oxford-University-Circlet.svg.png',
    `description` = 'The University of Oxford is a collegiate research university in Oxford, England.',
    `location` = 'Oxford, United Kingdom',
    `website` = 'https://www.ox.ac.uk',
    `updated_at` = NOW();

-- Harvard University
INSERT INTO `universities` (`name`, `logo`, `description`, `location`, `website`, `is_active`, `created_at`, `updated_at`)
VALUES (
    'Harvard University',
    'https://upload.wikimedia.org/wikipedia/en/thumb/2/29/Harvard_shield_wreath.svg/300px-Harvard_shield_wreath.svg.png',
    'Harvard University is a private Ivy League research university in Cambridge, Massachusetts.',
    'Cambridge, Massachusetts, USA',
    'https://www.harvard.edu',
    1,
    NOW(),
    NOW()
)
ON DUPLICATE KEY UPDATE
    `logo` = 'https://upload.wikimedia.org/wikipedia/en/thumb/2/29/Harvard_shield_wreath.svg/300px-Harvard_shield_wreath.svg.png',
    `description` = 'Harvard University is a private Ivy League research university in Cambridge, Massachusetts.',
    `location` = 'Cambridge, Massachusetts, USA',
    `website` = 'https://www.harvard.edu',
    `updated_at` = NOW();

-- Stanford University
INSERT INTO `universities` (`name`, `logo`, `description`, `location`, `website`, `is_active`, `created_at`, `updated_at`)
VALUES (
    'Stanford University',
    'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Seal_of_Leland_Stanford_Junior_University.svg/300px-Seal_of_Leland_Stanford_Junior_University.svg.png',
    'Stanford University is a private research university in Stanford, California.',
    'Stanford, California, USA',
    'https://www.stanford.edu',
    1,
    NOW(),
    NOW()
)
ON DUPLICATE KEY UPDATE
    `logo` = 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Seal_of_Leland_Stanford_Junior_University.svg/300px-Seal_of_Leland_Stanford_Junior_University.svg.png',
    `description` = 'Stanford University is a private research university in Stanford, California.',
    `location` = 'Stanford, California, USA',
    `website` = 'https://www.stanford.edu',
    `updated_at` = NOW();

-- MIT
INSERT INTO `universities` (`name`, `logo`, `description`, `location`, `website`, `is_active`, `created_at`, `updated_at`)
VALUES (
    'MIT',
    'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/MIT_logo.svg/300px-MIT_logo.svg.png',
    'Massachusetts Institute of Technology is a private research university in Cambridge, Massachusetts.',
    'Cambridge, Massachusetts, USA',
    'https://www.mit.edu',
    1,
    NOW(),
    NOW()
)
ON DUPLICATE KEY UPDATE
    `logo` = 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/MIT_logo.svg/300px-MIT_logo.svg.png',
    `description` = 'Massachusetts Institute of Technology is a private research university in Cambridge, Massachusetts.',
    `location` = 'Cambridge, Massachusetts, USA',
    `website` = 'https://www.mit.edu',
    `updated_at` = NOW();

-- Cambridge University
INSERT INTO `universities` (`name`, `logo`, `description`, `location`, `website`, `is_active`, `created_at`, `updated_at`)
VALUES (
    'Cambridge University',
    'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Coat_of_Arms_of_the_University_of_Cambridge.svg/300px-Coat_of_Arms_of_the_University_of_Cambridge.svg.png',
    'The University of Cambridge is a collegiate research university in Cambridge, United Kingdom.',
    'Cambridge, United Kingdom',
    'https://www.cam.ac.uk',
    1,
    NOW(),
    NOW()
)
ON DUPLICATE KEY UPDATE
    `logo` = 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Coat_of_Arms_of_the_University_of_Cambridge.svg/300px-Coat_of_Arms_of_the_University_of_Cambridge.svg.png',
    `description` = 'The University of Cambridge is a collegiate research university in Cambridge, United Kingdom.',
    `location` = 'Cambridge, United Kingdom',
    `website` = 'https://www.cam.ac.uk',
    `updated_at` = NOW();

-- IIT Delhi
INSERT INTO `universities` (`name`, `logo`, `description`, `location`, `website`, `is_active`, `created_at`, `updated_at`)
VALUES (
    'IIT Delhi',
    'https://upload.wikimedia.org/wikipedia/en/thumb/f/fd/Indian_Institute_of_Technology_Delhi_Logo.svg/300px-Indian_Institute_of_Technology_Delhi_Logo.svg.png',
    'Indian Institute of Technology Delhi is a public technical university located in New Delhi, India.',
    'New Delhi, India',
    'https://home.iitd.ac.in',
    1,
    NOW(),
    NOW()
)
ON DUPLICATE KEY UPDATE
    `logo` = 'https://upload.wikimedia.org/wikipedia/en/thumb/f/fd/Indian_Institute_of_Technology_Delhi_Logo.svg/300px-Indian_Institute_of_Technology_Delhi_Logo.svg.png',
    `description` = 'Indian Institute of Technology Delhi is a public technical university located in New Delhi, India.',
    `location` = 'New Delhi, India',
    `website` = 'https://home.iitd.ac.in',
    `updated_at` = NOW();

-- IIM Ahmedabad
INSERT INTO `universities` (`name`, `logo`, `description`, `location`, `website`, `is_active`, `created_at`, `updated_at`)
VALUES (
    'IIM Ahmedabad',
    'https://upload.wikimedia.org/wikipedia/en/thumb/f/f5/Indian_Institute_of_Management_Ahmedabad_Logo.svg/300px-Indian_Institute_of_Management_Ahmedabad_Logo.svg.png',
    'Indian Institute of Management Ahmedabad is a public business school located in Ahmedabad, Gujarat, India.',
    'Ahmedabad, Gujarat, India',
    'https://www.iima.ac.in',
    1,
    NOW(),
    NOW()
)
ON DUPLICATE KEY UPDATE
    `logo` = 'https://upload.wikimedia.org/wikipedia/en/thumb/f/f5/Indian_Institute_of_Management_Ahmedabad_Logo.svg/300px-Indian_Institute_of_Management_Ahmedabad_Logo.svg.png',
    `description` = 'Indian Institute of Management Ahmedabad is a public business school located in Ahmedabad, Gujarat, India.',
    `location` = 'Ahmedabad, Gujarat, India',
    `website` = 'https://www.iima.ac.in',
    `updated_at` = NOW();

-- University of Delhi
INSERT INTO `universities` (`name`, `logo`, `description`, `location`, `website`, `is_active`, `created_at`, `updated_at`)
VALUES (
    'University of Delhi',
    'https://upload.wikimedia.org/wikipedia/en/thumb/4/4b/University_of_Delhi.svg/300px-University_of_Delhi.svg.png',
    'University of Delhi is a collegiate central university located in New Delhi, India.',
    'New Delhi, India',
    'http://www.du.ac.in',
    1,
    NOW(),
    NOW()
)
ON DUPLICATE KEY UPDATE
    `logo` = 'https://upload.wikimedia.org/wikipedia/en/thumb/4/4b/University_of_Delhi.svg/300px-University_of_Delhi.svg.png',
    `description` = 'University of Delhi is a collegiate central university located in New Delhi, India.',
    `location` = 'New Delhi, India',
    `website` = 'http://www.du.ac.in',
    `updated_at` = NOW();

-- BITS Pilani
INSERT INTO `universities` (`name`, `logo`, `description`, `location`, `website`, `is_active`, `created_at`, `updated_at`)
VALUES (
    'BITS Pilani',
    'https://upload.wikimedia.org/wikipedia/en/thumb/d/d3/BITS_Pilani-Logo.svg/300px-BITS_Pilani-Logo.svg.png',
    'Birla Institute of Technology and Science, Pilani is a deemed university in Pilani, Rajasthan, India.',
    'Pilani, Rajasthan, India',
    'https://www.bits-pilani.ac.in',
    1,
    NOW(),
    NOW()
)
ON DUPLICATE KEY UPDATE
    `logo` = 'https://upload.wikimedia.org/wikipedia/en/thumb/d/d3/BITS_Pilani-Logo.svg/300px-BITS_Pilani-Logo.svg.png',
    `description` = 'Birla Institute of Technology and Science, Pilani is a deemed university in Pilani, Rajasthan, India.',
    `location` = 'Pilani, Rajasthan, India',
    `website` = 'https://www.bits-pilani.ac.in',
    `updated_at` = NOW();

-- Manipal University
INSERT INTO `universities` (`name`, `logo`, `description`, `location`, `website`, `is_active`, `created_at`, `updated_at`)
VALUES (
    'Manipal University',
    'https://upload.wikimedia.org/wikipedia/en/thumb/9/94/Manipal_Academy_of_Higher_Education_logo.png/300px-Manipal_Academy_of_Higher_Education_logo.png',
    'Manipal Academy of Higher Education is a private deemed university in Manipal, Karnataka, India.',
    'Manipal, Karnataka, India',
    'https://www.manipal.edu',
    1,
    NOW(),
    NOW()
)
ON DUPLICATE KEY UPDATE
    `logo` = 'https://upload.wikimedia.org/wikipedia/en/thumb/9/94/Manipal_Academy_of_Higher_Education_logo.png/300px-Manipal_Academy_of_Higher_Education_logo.png',
    `description` = 'Manipal Academy of Higher Education is a private deemed university in Manipal, Karnataka, India.',
    `location` = 'Manipal, Karnataka, India',
    `website` = 'https://www.manipal.edu',
    `updated_at` = NOW();
