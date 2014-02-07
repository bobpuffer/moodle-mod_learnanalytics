<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Upgrades for learnanalytics
 *
 * @package    mod_learnanalytics
 * @copyright  2014 CLAMP
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

function xmldb_learnanalytics_upgrade($oldversion) {
    global $CFG, $DB;

    $dbman = $DB->get_manager();

    if ($oldversion < 2012061900) {
        if (!$dbman->table_exists('learnanalytics_cache')) {
            $dbman->install_one_table_from_xmldb_file($CFG->dirroot.'/mod/learnanalytics/db/install.xml', 'learnanalytics_cache');
        }
        upgrade_mod_savepoint(true, 2012061900, 'learnanalytics');
    }

    if ($oldversion < 2012080700) {
        $table = new xmldb_table('learnanalytics_cache');
        $field = new xmldb_field('rawdata');
        $field->set_attributes(XMLDB_TYPE_TEXT, 'big', null, null, null, null, null);
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field, 'settings');
        }

        upgrade_mod_savepoint(true, 2012080700, 'learnanalytics');
    }

    return true;
}
