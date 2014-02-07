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
 * Output rendering of learn_analytics report
 *
 * @package    mod_learn_analytics
 * @copyright  2014 CLAMP
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

class learn_analyticsindicator_login_renderer extends learn_analyticsindicator_renderer {
    public function user_report($data) {
        $html = '';
        foreach ($data->info as $i) {
            $html .= html_writer::start_tag('strong');
            $html .= html_writer::tag('span', $i->title);
            $html .= html_writer::end_tag('strong');
            $html .= html_writer::empty_tag('br');
            $html .= $this->output->help_icon('weighting', 'learn_analyticsindicator_login');
            $html .= html_writer::tag('span', get_string('weighting', 'learn_analyticsindicator_login').': ' . $i->weighting);
            $html .= html_writer::empty_tag('br');
            $html .= $this->output->help_icon('localrisk', 'learn_analyticsindicator_login');
            $html .= html_writer::tag('span', get_string('localrisk', 'learn_analyticsindicator_login').': ' . $i->localrisk);
            $html .= html_writer::empty_tag('br');
            $html .= $this->output->help_icon('riskcontribution', 'learn_analyticsindicator_login');
            $html .= html_writer::tag('span', get_string('riskcontribution', 'learn_analyticsindicator_login').': ' .  $i->riskcontribution);
            $html .= html_writer::empty_tag('br');
            $html .= $this->output->help_icon('logic', 'learn_analyticsindicator_assessment');
            $html .= html_writer::tag('span', get_string('logic', 'learn_analyticsindicator_login').': ' .  $i->logic);
            $html .= html_writer::empty_tag('br');
            $html .= html_writer::empty_tag('br');
        }
        $value = sprintf("%.0f%%", 100 * $data->risk);
        $html .= html_writer::tag('span', get_string('riskscore', 'learn_analytics').": $value");
        return $html;
    }
}
