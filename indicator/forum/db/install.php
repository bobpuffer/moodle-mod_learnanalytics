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

function xmldb_learnanalyticsindicator_forum_install() {
    global $DB;

    if (!$DB->record_exists('learnanalytics_indicator', array('name' => 'forum'))) {
        $indicator = new stdClass();
        $indicator->name = 'forum';
        $indicator->visible = 1;
        $DB->insert_record('learnanalytics_indicator', $indicator);
    }
}
