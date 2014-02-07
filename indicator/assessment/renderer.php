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

class learn_analyticsindicator_assessment_renderer extends learn_analyticsindicator_renderer {
    public function user_report($data) {
        $html = '';
        foreach ($data->info as $i) {
            $html .= html_writer::start_tag('strong');
            $html .= html_writer::tag('span', $i->assessment);
            $html .= html_writer::end_tag('strong');
            $html .= html_writer::empty_tag('br');
            $html .= $this->output->help_icon('status', 'learn_analyticsindicator_assessment');
            $html .= html_writer::tag('span', 'Status: ' . $i->submitted);
            if (isset($i->override)) {
                $html .= html_writer::empty_tag('br');
                $html .= $this->output->help_icon('override', 'learn_analyticsindicator_assessment');
                $html .= html_writer::tag('span', 'Override: A ' . $i->override . ' override on due date is in place.');
            }
            $html .= html_writer::empty_tag('br');
            $html .= $this->output->help_icon('weighting', 'learn_analyticsindicator_assessment');
            $html .= html_writer::tag('span', 'Weighting: ' . $i->assessmentweighting);
            if (isset($i->dayslate)) {
                $html .= html_writer::empty_tag('br');
                $html .= $this->output->help_icon('dayslate', 'learn_analyticsindicator_assessment');
                $html .= html_writer::tag('span', 'Days late: ' .  $i->dayslate);
            }
            $html .= html_writer::empty_tag('br');
            $html .= $this->output->help_icon('localrisk', 'learn_analyticsindicator_assessment');
            $html .= html_writer::tag('span', 'Local risk: ' . $i->localrisk);
            $html .= html_writer::empty_tag('br');
            $html .= $this->output->help_icon('riskcontribution', 'learn_analyticsindicator_assessment');
            $html .= html_writer::tag('span', 'Risk Contribution: ' .  $i->riskcontribution);
            $html .= html_writer::empty_tag('br');
            $html .= $this->output->help_icon('logic', 'learn_analyticsindicator_assessment');
            $html .= html_writer::tag('span', 'Logic: ' .  $i->logic);
            $html .= html_writer::empty_tag('br');
            $html .= html_writer::empty_tag('br');
        }
        return $html;
    }
}
