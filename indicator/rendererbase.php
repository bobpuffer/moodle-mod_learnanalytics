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
 * Output rendering of learnanalytics report
 *
 * @package    mod_learnanalytics
 * @copyright  2014 CLAMP
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/pluginlib.php');
require_once($CFG->dirroot . '/report/learnanalytics/locallib.php');

/**
 * Rendering methods for the learnanalytics reports
 */

abstract class learnanalyticsindicator_renderer extends plugin_renderer_base {
    public function user_report($data) {
        $value = sprintf("%.0f%%", 100 * $data->risk);
        $html = html_writer::tag('span', get_string('riskscore', 'learnanalytics').": $value");
        return $html;
    }
}
