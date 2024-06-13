<?php

namespace App\Http\Controllers\Admin\Graduate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Graduate;
use PDF;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;

class ReportController extends Controller
{
    public function index(Request $request)
    {

        $graduation_year = $request->graduation_year;
        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }

        // ГРАНТ ОБУЧЕНИЕ //
        // AT-MX
        $grant_at_mx = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(МХ)'],
        ])
            ->count();
        $grant_at_mx_magister = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(МХ)'],
            ['magister', TRUE]
        ])
            ->count();
        $grant_at_mx_work = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(МХ)'],
            ['work', '!=', NULL]
        ])
            ->count();
        $grant_at_mx_direction = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(МХ)'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $grant_at_mx_work = $grant_at_mx_work + $grant_at_mx_direction;
        $grant_at_mx_no_work = $grant_at_mx - $grant_at_mx_magister - $grant_at_mx_work;
        $grant_at_mx_procent = (($grant_at_mx_work + $grant_at_mx_magister) * 100) / $grant_at_mx;

        if ($grant_at_mx === 0) {
            $grant_at_mx_procent = 0;
        } else {
            $grant_at_mx_procent = (($grant_at_mx_work + $grant_at_mx_magister) * 100) / $grant_at_mx;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }

        // AT-АВ
        $grant_at_mv = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(АВ)'],
        ])
            ->count();
        $grant_at_mv_magister = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(АВ)'],
            ['magister', TRUE]
        ])
            ->count();
        $grant_at_mv_work = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(АВ)'],
            ['work', '!=', NULL]
        ])
            ->count();
        $grant_at_mv_direction = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(АВ)'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $grant_at_mv_work = $grant_at_mv_work + $grant_at_mv_direction;
        $grant_at_mv_no_work = $grant_at_mv - $grant_at_mv_magister - $grant_at_mv_work;

        if ($grant_at_mv === 0) {
            $grant_at_mv_procent = 0;
        } else {
            $grant_at_mv_procent = (($grant_at_mv_work + $grant_at_mv_magister) * 100) / $grant_at_mv;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }

        // AT-ОНО
        $grant_at_ono = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(ОНО)'],
        ])
            ->count();
        $grant_at_ono_magister = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(ОНО)'],
            ['magister', TRUE]
        ])
            ->count();
        $grant_at_ono_work = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(ОНО)'],
            ['work', '!=', NULL]
        ])
            ->count();
        $grant_at_ono_direction = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(ОНО)'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $grant_at_ono_work = $grant_at_ono_work + $grant_at_ono_direction;
        $grant_at_ono_no_work = $grant_at_ono - $grant_at_ono_magister - $grant_at_ono_work;

        if ($grant_at_ono == 0) {
            $grant_at_ono_procent = 0;
        } else {
            $grant_at_ono_procent = (($grant_at_ono_work + $grant_at_ono_magister) * 100) / $grant_at_ono;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }

        // AT-ОВД
        $grant_at_ovd = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-ОВД'],
        ])
            ->count();
        $grant_at_ovd_magister = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-ОВД'],
            ['magister', TRUE]
        ])
            ->count();
        $grant_at_ovd_work = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-ОВД'],
            ['work', '!=', NULL]
        ])
            ->count();
        $grant_at_ovd_direction = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-ОВД'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $grant_at_ovd_work = $grant_at_ovd_work + $grant_at_ovd_direction;
        $grant_at_ovd_no_work = $grant_at_ovd - $grant_at_ovd_magister - $grant_at_ovd_work;
        if ($grant_at_ovd == 0) {
            $grant_at_ovd_procent = 0;
        } else {
            $grant_at_ovd_procent = (($grant_at_ovd_work + $grant_at_ovd_magister) * 100) / $grant_at_ovd;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }


        // AT-АБ
        $grant_at_ab = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-АБ'],
        ])
            ->count();
        $grant_at_ab_magister = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-АБ'],
            ['magister', TRUE]
        ])
            ->count();
        $grant_at_ab_work = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-АБ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $grant_at_ab_direction = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-АБ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $grant_at_ab_work = $grant_at_ab_work + $grant_at_ab_direction;
        $grant_at_ab_no_work = $grant_at_ab - $grant_at_ab_magister - $grant_at_ab_work;
        if ($grant_at_ab == 0) {
            $grant_at_ab_procent = 0;
        } else {
            $grant_at_ab_procent = (($grant_at_ab_work + $grant_at_ab_magister) * 100) / $grant_at_ab;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }


        // ГРАНТ AT //
        $grant_at = $grant_at_mx + $grant_at_mv + $grant_at_ono + $grant_at_ovd + $grant_at_ab;
        $grant_at_magister = $grant_at_mx_magister + $grant_at_mv_magister + $grant_at_ono_magister + $grant_at_ovd_magister + $grant_at_ab_magister;
        $grant_at_work = $grant_at_mx_work + $grant_at_mv_work + $grant_at_ono_work + $grant_at_ovd_work + $grant_at_ab_work;
        $grant_at_no_work = $grant_at_mx_no_work + $grant_at_mv_no_work + $grant_at_ono_no_work + $grant_at_ovd_no_work + $grant_at_ab_no_work;
        $grant_at_direction = $grant_at_mx_direction + $grant_at_mv_direction + $grant_at_ono_direction + $grant_at_ovd_direction + $grant_at_ab_direction;
        $grant_at_procent = (($grant_at_work + $grant_at_magister) * 100) / $grant_at;

        // ОП-ЛГ
        $grant_op_lg = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ОП-ЛГ'],
        ])
            ->count();
        $grant_op_lg_magister = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ОП-ЛГ'],
            ['magister', TRUE]
        ])
            ->count();
        $grant_op_lg_work = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ОП-ЛГ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $grant_op_lg_direction = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ОП-ЛГ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $grant_op_lg_work = $grant_op_lg_work + $grant_op_lg_direction;
        $grant_op_lg_no_work = $grant_op_lg - $grant_op_lg_magister - $grant_op_lg_work;
        if ($grant_op_lg == 0) {
            $grant_op_lg_procent = 0;
        } else {
            $grant_op_lg_procent = (($grant_op_lg_work + $grant_op_lg_magister) * 100) / $grant_op_lg;
        }


        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }

        // ОП
        $grant_op = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ОП'],
        ])
            ->count();
        $grant_op_magister = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ОП'],
            ['magister', TRUE]
        ])
            ->count();
        $grant_op_work = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ОП'],
            ['work', '!=', NULL]
        ])
            ->count();
        $grant_op_direction = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ОП'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();

        $grant_op_no_work = $grant_op - $grant_op_magister - $grant_op_work;
        if ($grant_op == 0) {
            $grant_op_procent = 0;
        } else {
            $grant_op_procent = (($grant_op_work + $grant_op_magister) * 100) / $grant_op;
        }


        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }

        // ОП ВСЕ //
        $grant_op_all = $grant_op + $grant_op_lg;
        $grant_op_all_magister = $grant_op_magister + $grant_op_lg_magister;
        $grant_op_all_work = $grant_op_work + $grant_op_lg_work;
        $grant_op_all_no_work = $grant_op_no_work + $grant_op_lg_no_work;
        if ($grant_op_all == 0) {
            $grant_op_all_procent = 0;
        } else {
            $grant_op_all_procent = (($grant_op_all_work + $grant_op_all_magister) * 100) / $grant_op_all;
        }

        // МНП-АТ
        $grant_mnp_at = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'МНП-АТ'],
        ])
            ->count();
        $grant_mnp_at_magister = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'МНП-АТ'],
            ['magister', TRUE]
        ])
            ->count();
        $grant_mnp_at_work = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'МНП-АТ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $grant_mnp_at_direction = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'МНП-АТ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $grant_mnp_at_work = $grant_mnp_at_work + $grant_mnp_at_direction;
        $grant_mnp_at_no_work = $grant_mnp_at - $grant_mnp_at_magister - $grant_mnp_at_work;
        if ($grant_mnp_at == 0) {
            $grant_mnp_at_procent = 0;
        } else {
            $grant_mnp_at_procent = (($grant_mnp_at_work + $grant_mnp_at_magister) * 100) / $grant_mnp_at;
        }


        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }

        // МНП-ТУ
        $grant_mnp_tu = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'МНП-ТУ'],
        ])
            ->count();
        $grant_mnp_tu_magister = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'МНП-ТУ'],
            ['magister', TRUE]
        ])
            ->count();
        $grant_mnp_tu_work = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'МНП-ТУ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $grant_mnp_tu_direction = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'МНП-ТУ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $grant_mnp_tu_work = $grant_mnp_tu_work + $grant_mnp_tu_direction;
        $grant_mnp_tu_no_work = $grant_mnp_tu - $grant_mnp_tu_magister - $grant_mnp_tu_work;
        if ($grant_mnp_tu == 0) {
            $grant_mnp_tu_procent = 0;
        } else {
            $grant_mnp_tu_procent = (($grant_mnp_tu_work + $grant_mnp_tu_magister) * 100) / $grant_mnp_tu;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }


        // ДАТ
        $grant_dat = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ДОК-АТ'],
        ])
            ->count();
        $grant_dat_magister = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ДОК-АТ'],
            ['magister', TRUE]
        ])
            ->count();
        $grant_dat_work = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ДОК-АТ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $grant_dat_direction = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ДОК-АТ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $grant_dat_work = $grant_dat_work + $grant_dat_direction;
        $grant_dat_no_work = $grant_dat - $grant_dat_magister - $grant_dat_work;
        if ($grant_dat == 0) {
            $grant_dat_procent = 0;
        } else {
            $grant_dat_procent = (($grant_dat_work + $grant_dat_magister) * 100) / $grant_dat;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }


        // Грант ВСЕ
        $grant_all = $grant_at + $grant_op_all + $grant_mnp_at + $grant_mnp_tu + $grant_dat;
        $grant_all_magister = $grant_at_magister + $grant_op_all_magister + $grant_mnp_at_magister + $grant_mnp_tu_magister + $grant_dat_magister;
        $grant_all_work = $grant_at_work + $grant_op_all_work + $grant_mnp_at_work + $grant_mnp_tu_work + $grant_dat_work;
        $grant_all_no_work = $grant_at_no_work + $grant_op_all_no_work + $grant_mnp_at_no_work + $grant_mnp_tu_no_work + $grant_dat_no_work;
        if ($grant_all == 0) {
            $grant_all_procent = 0;
        } else {
            $grant_all_procent = (($grant_all_work + $grant_all_magister) * 100) / $grant_all;
        }

        // ПЛАТНОЕ //
        // АТ-МХ
        $paid_at_mx = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(МХ)'],
        ])
            ->count();
        $paid_at_mx_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(МХ)'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_at_mx_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(МХ)'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_at_mx_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(МХ)'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $paid_at_mx_work = $paid_at_mx_work + $paid_at_mx_direction;
        $paid_at_mx_no_work = $paid_at_mx - $paid_at_mx_magister - $paid_at_mx_work;
        if ($paid_at_mx == 0) {
            $paid_at_mx_procent = 0;
        } else {
            $paid_at_mx_procent = (($paid_at_mx_work + $paid_at_mx_magister) * 100) / $paid_at_mx;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }


        // АТ-АВ
        $paid_at_av = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(АВ)'],
        ])
            ->count();
        $paid_at_av_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(АВ)'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_at_av_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(АВ)'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_at_av_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(АВ)'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $paid_at_av_work = $paid_at_av_work + $paid_at_av_direction;
        $paid_at_av_no_work = $paid_at_av - $paid_at_av_magister - $paid_at_av_work;
        if ($paid_at_av == 0) {
            $paid_at_av_procent = 0;
        } else {
            $paid_at_av_procent = (($paid_at_av_work + $paid_at_av_magister) * 100) / $paid_at_av;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }


        // АТ-ОНО
        $paid_at_ono = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(ОНО)'],
        ])
            ->count();
        $paid_at_ono_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(ОНО)'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_at_ono_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(ОНО)'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_at_ono_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(ОНО)'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $paid_at_ono_work = $paid_at_ono_work + $paid_at_ono_direction;
        $paid_at_ono_no_work = $paid_at_ono - $paid_at_ono_magister - $paid_at_ono_work;
        if ($paid_at_ono == 0) {
            $paid_at_ono_procent = 0;
        } else {
            $paid_at_ono_procent = (($paid_at_ono_work + $paid_at_ono_magister) * 100) / $paid_at_ono;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }


        // АТ-АБ
        $paid_at_ab = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-АБ'],
        ])
            ->count();
        $paid_at_ab_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-АБ'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_at_ab_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-АБ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_at_ab_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-АБ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $paid_at_ab_work = $paid_at_ab_work + $paid_at_ab_direction;
        $paid_at_ab_no_work = $paid_at_ab - $paid_at_ab_magister - $paid_at_ab_work;
        if ($paid_at_ab == 0) {
            $paid_at_ab_procent = 0;
        } else {
            $paid_at_ab_procent = (($paid_at_ab_work + $paid_at_ab_magister) * 100) / $paid_at_ab;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }


        // АТ-ОВД
        $paid_at_ovd = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-ОВД'],
        ])
            ->count();
        $paid_at_ovd_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-ОВД'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_at_ovd_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-ОВД'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_at_ovd_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-ОВД'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $paid_at_ovd_work = $paid_at_ovd_work + $paid_at_ovd_direction;
        $paid_at_ovd_no_work = $paid_at_ovd - $paid_at_ovd_magister - $paid_at_ovd_work;
        if ($paid_at_ovd == 0) {
            $paid_at_ovd_procent = 0;
        } else {
            $paid_at_ovd_procent = (($paid_at_ovd_work + $paid_at_ovd_magister) * 100) / $paid_at_ovd;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }


        // АТ ВСЕ //
        $paid_at = $paid_at_mx + $paid_at_av + $paid_at_ono + $paid_at_ab + $paid_at_ovd;
        $paid_at_magister = $paid_at_mx_magister + $paid_at_av_magister + $paid_at_ono_magister + $paid_at_ab_magister + $paid_at_ovd_magister;
        $paid_at_work = $paid_at_mx_work + $paid_at_av_work + $paid_at_ono_work + $paid_at_ab_work + $paid_at_ovd_work;
        $paid_at_no_work = $paid_at_mx_no_work + $paid_at_av_no_work + $paid_at_ono_no_work + $paid_at_ab_no_work + $paid_at_ovd_no_work;
        if ($paid_at == 0) {
            $paid_at_procent = 0;
        } else {
            $paid_at_procent = (($paid_at_work + $paid_at_magister) * 100) / $paid_at;
        }

        // ОП-ЛГ
        $paid_op_lg = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'ОП-ЛГ'],
        ])
            ->count();
        $paid_op_lg_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'ОП-ЛГ'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_op_lg_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'ОП-ЛГ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_op_lg_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'ОП-ЛГ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $paid_op_lg_work = $paid_op_lg_work + $paid_op_lg_direction;
        $paid_op_lg_no_work = $paid_op_lg - $paid_op_lg_magister - $paid_op_lg_work;
        if ($paid_op_lg == 0) {
            $paid_op_lg_procent = 0;
        } else {
            $paid_op_lg_procent = (($paid_op_lg_work + $paid_op_lg_magister) * 100) / $paid_op_lg;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }


        // ОП
        $paid_op = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'ОП'],
        ])
            ->count();
        $paid_op_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'ОП'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_op_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'ОП'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_op_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'ОП'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $paid_op_work = $paid_op_work + $paid_op_direction;
        $paid_op_no_work = $paid_op - $paid_op_magister - $paid_op_work;
        if ($paid_op == 0) {
            $paid_op_procent = 0;
        } else {
            $paid_op_procent = (($paid_op_work + $paid_op_magister) * 100) / $paid_op;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }


        // ОП ВСЕ //
        $paid_op_all = $paid_op_lg + $paid_op;
        $paid_op_all_magister = $paid_op_lg_magister + $paid_op_magister;
        $paid_op_all_work = $paid_op_lg_work + $paid_op_work;
        $paid_op_all_no_work = $paid_op_lg_no_work + $paid_op_no_work;
        if ($paid_op_all == 0) {
            $paid_op_all_procent = 0;
        } else {
            $paid_op_all_procent = (($paid_op_all_work + $paid_op_all_magister) * 100) / $paid_op_all;
        }

        // Д-ЛЭ
        $paid_d_le = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ЛЭ'],
        ])
            ->count();
        $paid_d_le_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ЛЭ'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_d_le_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ЛЭ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_d_le_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ЛЭ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $paid_d_le_work = $paid_d_le_work + $paid_d_le_direction;
        $paid_d_le_no_work = $paid_d_le - $paid_d_le_magister - $paid_d_le_work;
        if ($paid_d_le == 0) {
            $paid_d_le_procent = 0;
        } else {
            $paid_d_le_procent = (($paid_d_le_work + $paid_d_le_magister) * 100) / $paid_d_le;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }


        // Д-МХ
        $paid_d_mx = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-МХ'],
        ])
            ->count();
        $paid_d_mx_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-МХ'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_d_mx_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-МХ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_d_mx_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-МХ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $paid_d_mx_work = $paid_d_mx_work + $paid_d_mx_direction;
        $paid_d_mx_no_work = $paid_d_mx - $paid_d_mx_magister - $paid_d_mx_work;
        if ($paid_d_mx == 0) {
            $paid_d_mx_procent = 0;
        } else {
            $paid_d_mx_procent = (($paid_d_mx_work + $paid_d_mx_magister) * 100) / $paid_d_mx;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }


        // Д-АВ
        $paid_d_av = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-АВ'],
        ])
            ->count();
        $paid_d_av_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-АВ'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_d_av_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-АВ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_d_av_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-АВ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $paid_d_av_work = $paid_d_av_work + $paid_d_av_direction;
        $paid_d_av_no_work = $paid_d_av - $paid_d_av_magister - $paid_d_av_work;
        if ($paid_d_av == 0) {
            $paid_d_av_procent = 0;
        } else {
            $paid_d_av_procent = (($paid_d_av_work + $paid_d_av_magister) * 100) / $paid_d_av;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }


        // Д-ОВД
        $paid_d_ovd = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОВД'],
        ])
            ->count();
        $paid_d_ovd_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОВД'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_d_ovd_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОВД'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_d_ovd_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОВД'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $paid_d_ovd_work = $paid_d_ovd_work + $paid_d_ovd_direction;
        $paid_d_ovd_no_work = $paid_d_ovd - $paid_d_ovd_magister - $paid_d_ovd_work;
        if ($paid_d_ovd == 0) {
            $paid_d_ovd_procent = 0;
        } else {
            $paid_d_ovd_procent = (($paid_d_ovd_work + $paid_d_ovd_magister) * 100) / $paid_d_ovd;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }


        // Д-АБ
        $paid_d_ab = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-АБ'],
        ])
            ->count();
        $paid_d_ab_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-АБ'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_d_ab_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-АБ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_d_ab_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-АБ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $paid_d_ab_work = $paid_d_ab_work + $paid_d_ab_direction;
        $paid_d_ab_no_work = $paid_d_ab - $paid_d_ab_magister - $paid_d_ab_work;
        if ($paid_d_ab == 0) {
            $paid_d_ab_procent = 0;
        } else {
            $paid_d_ab_procent = (($paid_d_ab_work + $paid_d_ab_magister) * 100) / $paid_d_ab;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }


        // Д-ОНО
        $paid_d_ono = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОНО'],
        ])
            ->count();
        $paid_d_ono_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОНО'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_d_ono_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОНО'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_d_ono_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОНО'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $paid_d_ono_work = $paid_d_ono_work + $paid_d_ono_direction;
        $paid_d_ono_no_work = $paid_d_ono - $paid_d_ono_magister - $paid_d_ono_work;
        if ($paid_d_ono == 0) {
            $paid_d_ono_procent = 0;
        } else {
            $paid_d_ono_procent = (($paid_d_ono_work + $paid_d_ono_magister) * 100) / $paid_d_ono;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }


        // Д-АТ ВСЕ //
        $paid_dat = $paid_d_le + $paid_d_mx + $paid_d_av + $paid_d_ovd + $paid_d_ab + $paid_d_ono;
        $paid_dat_magister = $paid_d_le_magister + $paid_d_mx_magister + $paid_d_av_magister + $paid_d_ovd_magister + $paid_d_ab_magister + $paid_d_ono_magister;
        $paid_dat_work = $paid_d_le_work + $paid_d_mx_work + $paid_d_av_work + $paid_d_ovd_work + $paid_d_ab_work + $paid_d_ono_work;
        $paid_dat_no_work = $paid_d_le_no_work + $paid_d_mx_no_work + $paid_d_av_no_work + $paid_d_ovd_no_work + $paid_d_ab_no_work + $paid_d_ono_no_work;
        if ($paid_dat == 0) {
            $paid_dat_procent = 0;
        } else {
            $paid_dat_procent = (($paid_dat_work + $paid_dat_magister) * 100) / $paid_dat;
        }

        // Д-ОП
        $paid_d_op = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОП'],
        ])
            ->count();
        $paid_d_op_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОП'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_d_op_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОП'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_d_op_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОП'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $paid_d_op_work = $paid_d_op_work + $paid_d_op_direction;
        $paid_d_op_no_work = $paid_d_op - $paid_d_op_magister - $paid_d_op_work;
        if ($paid_d_op == 0) {
            $paid_d_op_procent = 0;
        } else {
            $paid_d_op_procent = (($paid_d_op_work + $paid_d_op_magister) * 100) / $paid_d_op;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }


        // Д-ОП-ЛГ
        $paid_d_op_lg = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОП-ЛГ'],
        ])
            ->count();
        $paid_d_op_lg_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОП-ЛГ'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_d_op_lg_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОП-ЛГ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_d_op_lg_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОП-ЛГ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $paid_d_op_lg_work = $paid_d_op_lg_work + $paid_d_op_lg_direction;
        $paid_d_op_lg_no_work = $paid_d_op_lg - $paid_d_op_lg_magister - $paid_d_op_lg_work;
        if ($paid_d_op_lg == 0) {
            $paid_d_op_lg_procent = 0;
        } else {
            $paid_d_op_lg_procent = (($paid_d_op_lg_work + $paid_d_op_lg_magister) * 100) / $paid_d_op_lg;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }


        // Д-ОП ВСЕ //
        $paid_d_op_all = $paid_d_op + $paid_d_op_lg;
        $paid_d_op_all_magister = $paid_d_op_magister + $paid_d_op_lg_magister;
        $paid_d_op_all_work = $paid_d_op_work + $paid_d_op_lg_work;
        $paid_d_op_all_no_work = $paid_d_op_no_work + $paid_d_op_lg_no_work;
        if ($paid_d_op_all == 0) {
            $paid_d_op_all_procent = 0;
        } else {
            $paid_d_op_all_procent = (($paid_d_op_all_work + $paid_d_op_all_magister) * 100) / $paid_d_op_all;
        }

        // МП-АТ
        $paid_mp_at = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МП-АТ'],
        ])
            ->count();
        $paid_mp_at_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МП-АТ'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_mp_at_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МП-АТ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_mp_at_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МП-АТ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $paid_mp_at_work = $paid_mp_at_work + $paid_mp_at_direction;
        $paid_mp_at_no_work = $paid_mp_at - $paid_mp_at_magister - $paid_mp_at_work;
        if ($paid_mp_at == 0) {
            $paid_mp_at_procent = 0;
        } else {
            $paid_mp_at_procent = (($paid_mp_at_work + $paid_mp_at_magister) * 100) / $paid_mp_at;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }


        // МП-ТУ
        $paid_mp_tu = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МП-ТУ'],
        ])
            ->count();
        $paid_mp_tu_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МП-ТУ'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_mp_tu_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МП-ТУ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_mp_tu_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МП-ТУ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $paid_mp_tu_work = $paid_mp_tu_work + $paid_mp_tu_direction;
        $paid_mp_tu_no_work = $paid_mp_tu - $paid_mp_tu_magister - $paid_mp_tu_work;
        if ($paid_mp_tu == 0) {
            $paid_mp_tu_procent = 0;
        } else {
            $paid_mp_tu_procent = (($paid_mp_tu_work + $paid_mp_tu_magister) * 100) / $paid_mp_tu;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }


        // МНП-ТУ
        $paid_mnp_tu = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МНП-ТУ'],
        ])
            ->count();
        $paid_mnp_tu_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МНП-ТУ'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_mnp_tu_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МНП-ТУ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_mnp_tu_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МНП-ТУ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        // $paid_mnp_tu_work = $paid_mnp_tu_work + $paid_mnp_tu_direction;
        $paid_mnp_tu_no_work = $paid_mnp_tu - $paid_mnp_tu_magister - $paid_mnp_tu_work;
        if ($paid_mnp_tu == 0) {
            $paid_mnp_tu_procent = 0;
        } else {
            $paid_mnp_tu_procent = (($paid_mnp_tu_work + $paid_mnp_tu_magister) * 100) / $paid_mnp_tu;
        }

        if (isset($graduation_year)) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } else {
            $grad_year = DB::table('graduates');
        }


        // ПЛАТНОЕ ВСЕ
        $paid_all = $paid_at + $paid_op_all + $paid_dat + $paid_d_op_all + $paid_mp_at + $paid_mp_tu + $paid_mnp_tu;
        $paid_all_magister = $paid_at_magister + $paid_op_all_magister + $paid_dat_magister + $paid_d_op_all_magister + $paid_mp_at_magister + $paid_mp_tu_magister + $paid_mnp_tu_magister;
        $paid_all_work = $paid_at_work + $paid_op_all_work + $paid_dat_work + $paid_d_op_all_work + $paid_mp_at_work + $paid_mp_tu_work + $paid_mnp_tu_work;
        $paid_all_no_work = $paid_at_no_work + $paid_op_all_no_work + $paid_dat_no_work + $paid_d_op_all_no_work + $paid_mp_at_no_work + $paid_mp_tu_no_work + $paid_mnp_tu_no_work;

        if ($paid_all == 0) {
            $paid_all_procent = 0;
        } else {
            $paid_all_procent = (($paid_all_work + $paid_all_magister) * 100) / $paid_all;
        }

        // ВСЕ
        $all = $grant_all + $paid_all;
        $all_magister = $grant_all_magister + $paid_all_magister;
        $all_work = $grant_all_work + $paid_all_work;
        $all_no_work = $grant_all_no_work + $paid_all_no_work;
        if ($all == 0) {
            $all_procent = 0;
        } else {
            $all_procent = (($all_work + $all_magister) * 100) / $all;
        }

        // Data Array
        $dataArray = [
            'grant_at_mx' => $grant_at_mx,
            'grant_at_mx_magister' => $grant_at_mx_magister,
            'grant_at_mx_work' => $grant_at_mx_work,
            'grant_at_mx_no_work' => $grant_at_mx_no_work,
            'grant_at_mx_procent' => $grant_at_mx_procent,

            'grant_at_mv' => $grant_at_mv,
            'grant_at_mv_magister' => $grant_at_mv_magister,
            'grant_at_mv_work' => $grant_at_mv_work,
            'grant_at_mv_no_work' => $grant_at_mv_no_work,
            'grant_at_mv_procent' => $grant_at_mv_procent,

            'grant_at_ono' => $grant_at_ono,
            'grant_at_ono_magister' => $grant_at_ono_magister,
            'grant_at_ono_work' => $grant_at_ono_work,
            'grant_at_ono_no_work' => $grant_at_ono_no_work,
            'grant_at_ono_procent' => $grant_at_ono_procent,

            'grant_at_ovd' => $grant_at_ovd,
            'grant_at_ovd_magister' => $grant_at_ovd_magister,
            'grant_at_ovd_work' => $grant_at_ovd_work,
            'grant_at_ovd_no_work' => $grant_at_ovd_no_work,
            'grant_at_ovd_procent' => $grant_at_ovd_procent,

            'grant_at_ab' => $grant_at_ab,
            'grant_at_ab_magister' => $grant_at_ab_magister,
            'grant_at_ab_work' => $grant_at_ab_work,
            'grant_at_ab_no_work' => $grant_at_ab_no_work,
            'grant_at_ab_procent' => $grant_at_ab_procent,

            'grant_at' => $grant_at,
            'grant_at_magister' => $grant_at_magister,
            'grant_at_work' => $grant_at_work,
            'grant_at_no_work' => $grant_at_no_work,
            'grant_at_procent' => $grant_at_procent,

            'grant_op_lg' => $grant_op_lg,
            'grant_op_lg_magister' => $grant_op_lg_magister,
            'grant_op_lg_work' => $grant_op_lg_work,
            'grant_op_lg_no_work' => $grant_op_lg_no_work,
            'grant_op_lg_procent' => $grant_op_lg_procent,

            'grant_op' => $grant_op,
            'grant_op_magister' => $grant_op_magister,
            'grant_op_work' => $grant_op_work,
            'grant_op_no_work' => $grant_op_no_work,
            'grant_op_procent' => $grant_op_procent,

            'grant_op_all' => $grant_op_all,
            'grant_op_all_magister' => $grant_op_all_magister,
            'grant_op_all_work' => $grant_op_all_work,
            'grant_op_all_no_work' => $grant_op_all_no_work,
            'grant_op_all_procent' => $grant_op_all_procent,

            'grant_mnp_at' => $grant_mnp_at,
            'grant_mnp_at_magister' => $grant_mnp_at_magister,
            'grant_mnp_at_work' => $grant_mnp_at_work,
            'grant_mnp_at_no_work' => $grant_mnp_at_no_work,
            'grant_mnp_at_procent' => $grant_mnp_at_procent,

            'grant_mnp_tu' => $grant_mnp_tu,
            'grant_mnp_tu_magister' => $grant_mnp_tu_magister,
            'grant_mnp_tu_work' => $grant_mnp_tu_work,
            'grant_mnp_tu_no_work' => $grant_mnp_tu_no_work,
            'grant_mnp_tu_procent' => $grant_mnp_tu_procent,

            'grant_dat' => $grant_dat,
            'grant_dat_magister' => $grant_dat_magister,
            'grant_dat_work' => $grant_dat_work,
            'grant_dat_no_work' => $grant_dat_no_work,
            'grant_dat_procent' => $grant_dat_procent,

            'grant_all' => $grant_all,
            'grant_all_magister' => $grant_all_magister,
            'grant_all_work' => $grant_all_work,
            'grant_all_no_work' => $grant_all_no_work,
            'grant_all_procent' => $grant_all_procent,

            'paid_at_mx' => $paid_at_mx,
            'paid_at_mx_magister' => $paid_at_mx_magister,
            'paid_at_mx_work' => $paid_at_mx_work,
            'paid_at_mx_no_work' => $paid_at_mx_no_work,
            'paid_at_mx_procent' => $paid_at_mx_procent,

            'paid_at_av' => $paid_at_av,
            'paid_at_av_magister' => $paid_at_av_magister,
            'paid_at_av_work' => $paid_at_av_work,
            'paid_at_av_no_work' => $paid_at_av_no_work,
            'paid_at_av_procent' => $paid_at_av_procent,

            'paid_at_ono' => $paid_at_ono,
            'paid_at_ono_magister' => $paid_at_ono_magister,
            'paid_at_ono_work' => $paid_at_ono_work,
            'paid_at_ono_no_work' => $paid_at_ono_no_work,
            'paid_at_ono_procent' => $paid_at_ono_procent,

            'paid_at_ab' => $paid_at_ab,
            'paid_at_ab_magister' => $paid_at_ab_magister,
            'paid_at_ab_work' => $paid_at_ab_work,
            'paid_at_ab_no_work' => $paid_at_ab_no_work,
            'paid_at_ab_procent' => $paid_at_ab_procent,

            'paid_at_ovd' => $paid_at_ovd,
            'paid_at_ovd_magister' => $paid_at_ovd_magister,
            'paid_at_ovd_work' => $paid_at_ovd_work,
            'paid_at_ovd_no_work' => $paid_at_ovd_no_work,
            'paid_at_ovd_procent' => $paid_at_ovd_procent,

            'paid_at' => $paid_at,
            'paid_at_magister' => $paid_at_magister,
            'paid_at_work' => $paid_at_work,
            'paid_at_no_work' => $paid_at_no_work,
            'paid_at_procent' => $paid_at_procent,

            'paid_op_lg' => $paid_op_lg,
            'paid_op_lg_magister' => $paid_op_lg_magister,
            'paid_op_lg_work' => $paid_op_lg_work,
            'paid_op_lg_no_work' => $paid_op_lg_no_work,
            'paid_op_lg_procent' => $paid_op_lg_procent,

            'paid_op' => $paid_op,
            'paid_op_magister' => $paid_op_magister,
            'paid_op_work' => $paid_op_work,
            'paid_op_no_work' => $paid_op_no_work,
            'paid_op_procent' => $paid_op_procent,

            'paid_op_all' => $paid_op_all,
            'paid_op_all_magister' => $paid_op_all_magister,
            'paid_op_all_work' => $paid_op_all_work,
            'paid_op_all_no_work' => $paid_op_all_no_work,
            'paid_op_all_procent' => $paid_op_all_procent,

            'paid_d_le' => $paid_d_le,
            'paid_d_le_magister' => $paid_d_le_magister,
            'paid_d_le_work' => $paid_d_le_work,
            'paid_d_le_no_work' => $paid_d_le_no_work,
            'paid_d_le_procent' => $paid_d_le_procent,

            'paid_d_mx' => $paid_d_mx,
            'paid_d_mx_magister' => $paid_d_mx_magister,
            'paid_d_mx_work' => $paid_d_mx_work,
            'paid_d_mx_no_work' => $paid_d_mx_no_work,
            'paid_d_mx_procent' => $paid_d_mx_procent,

            'paid_d_av' => $paid_d_av,
            'paid_d_av_magister' => $paid_d_av_magister,
            'paid_d_av_work' => $paid_d_av_work,
            'paid_d_av_no_work' => $paid_d_av_no_work,
            'paid_d_av_procent' => $paid_d_av_procent,

            'paid_d_ovd' => $paid_d_ovd,
            'paid_d_ovd_magister' => $paid_d_ovd_magister,
            'paid_d_ovd_work' => $paid_d_ovd_work,
            'paid_d_ovd_no_work' => $paid_d_ovd_no_work,
            'paid_d_ovd_procent' => $paid_d_ovd_procent,

            'paid_d_ab' => $paid_d_ab,
            'paid_d_ab_magister' => $paid_d_ab_magister,
            'paid_d_ab_work' => $paid_d_ab_work,
            'paid_d_ab_no_work' => $paid_d_ab_no_work,
            'paid_d_ab_procent' => $paid_d_ab_procent,

            'paid_d_ono' => $paid_d_ono,
            'paid_d_ono_magister' => $paid_d_ono_magister,
            'paid_d_ono_work' => $paid_d_ono_work,
            'paid_d_ono_no_work' => $paid_d_ono_no_work,
            'paid_d_ono_procent' => $paid_d_ono_procent,

            'paid_dat' => $paid_dat,
            'paid_dat_magister' => $paid_dat_magister,
            'paid_dat_work' => $paid_dat_work,
            'paid_dat_no_work' => $paid_dat_no_work,
            'paid_dat_procent' => $paid_dat_procent,

            'paid_d_op' => $paid_d_op,
            'paid_d_op_magister' => $paid_d_op_magister,
            'paid_d_op_work' => $paid_d_op_work,
            'paid_d_op_no_work' => $paid_d_op_no_work,
            'paid_d_op_procent' => $paid_d_op_procent,

            'paid_d_op_lg' => $paid_d_op_lg,
            'paid_d_op_lg_magister' => $paid_d_op_lg_magister,
            'paid_d_op_lg_work' => $paid_d_op_lg_work,
            'paid_d_op_lg_no_work' => $paid_d_op_lg_no_work,
            'paid_d_op_lg_procent' => $paid_d_op_lg_procent,

            'paid_d_op_all' => $paid_d_op_all,
            'paid_d_op_all_magister' => $paid_d_op_all_magister,
            'paid_d_op_all_work' => $paid_d_op_all_work,
            'paid_d_op_all_no_work' => $paid_d_op_all_no_work,
            'paid_d_op_all_procent' => $paid_d_op_all_procent,

            'paid_mp_at' => $paid_mp_at,
            'paid_mp_at_magister' => $paid_mp_at_magister,
            'paid_mp_at_work' => $paid_mp_at_work,
            'paid_mp_at_no_work' => $paid_mp_at_no_work,
            'paid_mp_at_procent' => $paid_mp_at_procent,

            'paid_mp_tu' => $paid_mp_tu,
            'paid_mp_tu_magister' => $paid_mp_tu_magister,
            'paid_mp_tu_work' => $paid_mp_tu_work,
            'paid_mp_tu_no_work' => $paid_mp_tu_no_work,
            'paid_mp_tu_procent' => $paid_mp_tu_procent,

            'paid_mnp_tu' => $paid_mnp_tu,
            'paid_mnp_tu_magister' => $paid_mnp_tu_magister,
            'paid_mnp_tu_work' => $paid_mnp_tu_work,
            'paid_mnp_tu_no_work' => $paid_mnp_tu_no_work,
            'paid_mnp_tu_procent' => $paid_mnp_tu_procent,

            'paid_all' => $paid_all,
            'paid_all_magister' => $paid_all_magister,
            'paid_all_work' => $paid_all_work,
            'paid_all_no_work' => $paid_all_no_work,
            'paid_all_procent' => $paid_all_procent,

            'all' => $all,
            'all_magister' => $all_magister,
            'all_work' => $all_work,
            'all_no_work' => $all_no_work,
            'all_procent' => $all_procent,

            'graduation_year' => $graduation_year,
        ];
        return view('admin.graduate.report.index', $dataArray);
    }
    public function pdf($graduation_year)
    {

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // ГРАНТ ОБУЧЕНИЕ //
        // AT-MX
        $grant_at_mx = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(МХ)'],
        ])
            ->count();
        $grant_at_mx_magister = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(МХ)'],
            ['magister', TRUE]
        ])
            ->count();
        $grant_at_mx_work = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(МХ)'],
            ['work', '!=', NULL]
        ])
            ->count();
        $grant_at_mx_direction = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(МХ)'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $grant_at_mx_no_work = $grant_at_mx - $grant_at_mx_magister - $grant_at_mx_work;
        if ($grant_at_mx == 0) {
            $grant_at_mx_procent = 0;
        } else {
            $grant_at_mx_procent = (($grant_at_mx_work + $grant_at_mx_magister) * 100) / $grant_at_mx;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }

        // AT-АВ
        $grant_at_mv = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(АВ)'],
        ])
            ->count();
        $grant_at_mv_magister = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(АВ)'],
            ['magister', TRUE]
        ])
            ->count();
        $grant_at_mv_work = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(АВ)'],
            ['work', '!=', NULL]
        ])
            ->count();
        $grant_at_mv_direction = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(АВ)'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $grant_at_mv_no_work = $grant_at_mv - $grant_at_mv_magister - $grant_at_mv_work;
        if ($grant_at_mv == 0) {
            $grant_at_mv_procent = 0;
        } else {
            $grant_at_mv_procent = (($grant_at_mv_work + $grant_at_mv_magister) * 100) / $grant_at_mv;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }

        // AT-ОНО
        $grant_at_ono = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(ОНО)'],
        ])
            ->count();
        $grant_at_ono_magister = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(ОНО)'],
            ['magister', TRUE]
        ])
            ->count();
        $grant_at_ono_work = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(ОНО)'],
            ['work', '!=', NULL]
        ])
            ->count();
        $grant_at_ono_direction = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-(ОНО)'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $grant_at_ono_no_work = $grant_at_ono - $grant_at_ono_magister - $grant_at_ono_work;
        if ($grant_at_ono == 0) {
            $grant_at_ono_procent = 0;
        } else {
            $grant_at_ono_procent = (($grant_at_ono_work + $grant_at_ono_magister) * 100) / $grant_at_ono;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // AT-ОВД
        $grant_at_ovd = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-ОВД'],
        ])
            ->count();
        $grant_at_ovd_magister = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-ОВД'],
            ['magister', TRUE]
        ])
            ->count();
        $grant_at_ovd_work = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-ОВД'],
            ['work', '!=', NULL]
        ])
            ->count();
        $grant_at_ovd_direction = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-ОВД'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $grant_at_ovd_no_work = $grant_at_ovd - $grant_at_ovd_magister - $grant_at_ovd_work;
        if ($grant_at_ovd == 0) {
            $grant_at_ovd_procent = 0;
        } else {
            $grant_at_ovd_procent = (($grant_at_ovd_work + $grant_at_ovd_magister) * 100) / $grant_at_ovd;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // AT-АБ
        $grant_at_ab = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-АБ'],
        ])
            ->count();
        $grant_at_ab_magister = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-АБ'],
            ['magister', TRUE]
        ])
            ->count();
        $grant_at_ab_work = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-АБ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $grant_at_ab_direction = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'АТ-АБ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $grant_at_ab_no_work = $grant_at_ab - $grant_at_ab_magister - $grant_at_ab_work;
        if ($grant_at_ab == 0) {
            $grant_at_ab_procent = 0;
        } else {
            $grant_at_ab_procent = (($grant_at_ab_work + $grant_at_ab_magister) * 100) / $grant_at_ab;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // ГРАНТ AT //
        $grant_at = $grant_at_mx + $grant_at_mv + $grant_at_ono + $grant_at_ovd + $grant_at_ab;
        $grant_at_magister = $grant_at_mx_magister + $grant_at_mv_magister + $grant_at_ono_magister + $grant_at_ovd_magister + $grant_at_ab_magister;
        $grant_at_work = $grant_at_mx_work + $grant_at_mv_work + $grant_at_ono_work + $grant_at_ovd_work + $grant_at_ab_work;
        $grant_at_no_work = $grant_at_mx_no_work + $grant_at_mv_no_work + $grant_at_ono_no_work + $grant_at_ovd_no_work + $grant_at_ab_no_work;
        $grant_at_direction = $grant_at_mx_direction + $grant_at_mv_direction + $grant_at_ono_direction + $grant_at_ovd_direction + $grant_at_ab_direction;
        if ($grant_at == 0) {
            $grant_at_procent = 0;
        } else {
            $grant_at_procent = (($grant_at_work + $grant_at_magister) * 100) / $grant_at;
        }

        // ОП-ЛГ
        $grant_op_lg = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ОП-ЛГ'],
        ])
            ->count();
        $grant_op_lg_magister = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ОП-ЛГ'],
            ['magister', TRUE]
        ])
            ->count();
        $grant_op_lg_work = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ОП-ЛГ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $grant_op_lg_direction = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ОП-ЛГ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $grant_op_lg_no_work = $grant_op_lg - $grant_op_lg_magister - $grant_op_lg_work;
        if ($grant_op_lg == 0) {
            $grant_op_lg_procent = 0;
        } else {
            $grant_op_lg_procent = (($grant_op_lg_work + $grant_op_lg_magister) * 100) / $grant_op_lg;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // ОП
        $grant_op17 = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ОП'],
        ])
            ->count();
        $grant_op17_magister = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ОП'],
            ['magister', TRUE]
        ])
            ->count();
        $grant_op17_work = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ОП'],
            ['work', '!=', NULL]
        ])
            ->count();
        $grant_op17_direction = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ОП'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $grant_op18 = $grad_year->where([
            ['form_study', 'грант'],
            ['groupe', 'УС-ОП -18'],
        ])
            ->count();
        $grant_op18_magister = $grad_year->where([
            ['form_study', 'грант'],
            ['groupe', 'УС-ОП -18'],
            ['magister', TRUE]
        ])
            ->count();
        $grant_op18_work = $grad_year->where([
            ['form_study', 'грант'],
            ['groupe', 'УС-ОП -18'],
            ['work', '!=', NULL]
        ])
            ->count();
        $grant_op18_direction = $grad_year->where([
            ['form_study', 'грант'],
            ['groupe', 'УС-ОП -18'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();

        $grant_op = $grant_op17 + $grant_op18;
        $grant_op_magister = $grant_op17_magister + $grant_op18_magister;
        $grant_op_work = $grant_op17_work + $grant_op18_work;
        $grant_op_no_work = $grant_op - $grant_op_magister - $grant_op_work;
        if ($grant_op == 0) {
            $grant_op_procent = 0;
        } else {
            $grant_op_procent = (($grant_op_work + $grant_op_magister) * 100) / $grant_op;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // ОП ВСЕ //
        $grant_op_all = $grant_op + $grant_op_lg;
        $grant_op_all_magister = $grant_op_magister + $grant_op_lg_magister;
        $grant_op_all_work = $grant_op_work + $grant_op_lg_work;
        $grant_op_all_no_work = $grant_op_no_work + $grant_op_lg_no_work;
        if ($grant_op_all == 0) {
            $grant_op_all_procent = 0;
        } else {
            $grant_op_all_procent = (($grant_op_all_work + $grant_op_all_magister) * 100) / $grant_op_all;
        }

        // МНП-АТ
        $grant_mnp_at = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'МНП-АТ'],
        ])
            ->count();
        $grant_mnp_at_magister = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'МНП-АТ'],
            ['magister', TRUE]
        ])
            ->count();
        $grant_mnp_at_work = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'МНП-АТ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $grant_mnp_at_direction = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'МНП-АТ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $grant_mnp_at_no_work = $grant_mnp_at - $grant_mnp_at_magister - $grant_mnp_at_work;
        if ($grant_mnp_at == 0) {
            $grant_mnp_at_procent = 0;
        } else {
            $grant_mnp_at_procent = (($grant_mnp_at_work + $grant_mnp_at_magister) * 100) / $grant_mnp_at;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // МНП-ТУ
        $grant_mnp_tu = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'МНП-ТУ'],
        ])
            ->count();
        $grant_mnp_tu_magister = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'МНП-ТУ'],
            ['magister', TRUE]
        ])
            ->count();
        $grant_mnp_tu_work = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'МНП-ТУ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $grant_mnp_tu_direction = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'МНП-ТУ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $grant_mnp_tu_no_work = $grant_mnp_tu - $grant_mnp_tu_magister - $grant_mnp_tu_work;
        if ($grant_mnp_tu == 0) {
            $grant_mnp_tu_procent = 0;
        } else {
            $grant_mnp_tu_procent = (($grant_mnp_tu_work + $grant_mnp_tu_magister) * 100) / $grant_mnp_tu;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // ДАТ
        $grant_dat = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ДОК-АТ'],
        ])
            ->count();
        $grant_dat_magister = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ДОК-АТ'],
            ['magister', TRUE]
        ])
            ->count();
        $grant_dat_work = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ДОК-АТ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $grant_dat_direction = $grad_year->where([
            ['form_study', 'грант'],
            ['unification', 'ДОК-АТ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $grant_dat_no_work = $grant_dat - $grant_dat_magister - $grant_dat_work;
        if ($grant_dat == 0) {
            $grant_dat_procent = 0;
        } else {
            $grant_dat_procent = (($grant_dat_work + $grant_dat_magister) * 100) / $grant_dat;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // Грант ВСЕ
        $grant_all = $grant_at + $grant_op_all + $grant_mnp_at + $grant_mnp_tu + $grant_dat;
        $grant_all_magister = $grant_at_magister + $grant_op_all_magister + $grant_mnp_at_magister + $grant_mnp_tu_magister + $grant_dat_magister;
        $grant_all_work = $grant_at_work + $grant_op_all_work + $grant_mnp_at_work + $grant_mnp_tu_work + $grant_dat_work;
        $grant_all_no_work = $grant_at_no_work + $grant_op_all_no_work + $grant_mnp_at_no_work + $grant_mnp_tu_no_work + $grant_dat_no_work;
        if ($grant_all == 0) {
            $grant_all_procent = 0;
        } else {
            $grant_all_procent = (($grant_all_work + $grant_all_magister) * 100) / $grant_all;
        }

        // ПЛАТНОЕ //
        // АТ-МХ
        $paid_at_mx = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(МХ)'],
        ])
            ->count();
        $paid_at_mx_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(МХ)'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_at_mx_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(МХ)'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_at_mx_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(МХ)'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $paid_at_mx_work = $paid_at_mx_work + $paid_at_mx_direction;
        $paid_at_mx_no_work = $paid_at_mx - $paid_at_mx_magister - $paid_at_mx_work;
        if ($paid_at_mx == 0) {
            $paid_at_mx_procent = 0;
        } else {
            $paid_at_mx_procent = (($paid_at_mx_work + $paid_at_mx_magister) * 100) / $paid_at_mx;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // АТ-АВ
        $paid_at_av = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(АВ)'],
        ])
            ->count();
        $paid_at_av_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(АВ)'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_at_av_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(АВ)'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_at_av_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(АВ)'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $paid_at_av_work = $paid_at_av_work + $paid_at_av_direction;
        $paid_at_av_no_work = $paid_at_av - $paid_at_av_magister - $paid_at_av_work;
        if ($paid_at_av == 0) {
            $paid_at_av_procent = 0;
        } else {
            $paid_at_av_procent = (($paid_at_av_work + $paid_at_av_magister) * 100) / $paid_at_av;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // АТ-ОНО
        $paid_at_ono = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(ОНО)'],
        ])
            ->count();
        $paid_at_ono_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(ОНО)'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_at_ono_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(ОНО)'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_at_ono_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-(ОНО)'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $paid_at_ono_work = $paid_at_ono_work + $paid_at_ono_direction;
        $paid_at_ono_no_work = $paid_at_ono - $paid_at_ono_magister - $paid_at_ono_work;
        if ($paid_at_ono == 0) {
            $paid_at_ono_procent = 0;
        } else {
            $paid_at_ono_procent = (($paid_at_ono_work + $paid_at_ono_magister) * 100) / $paid_at_ono;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // АТ-АБ
        $paid_at_ab = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-АБ'],
        ])
            ->count();
        $paid_at_ab_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-АБ'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_at_ab_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-АБ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_at_ab_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-АБ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $paid_at_ab_work = $paid_at_ab_work + $paid_at_ab_direction;
        $paid_at_ab_no_work = $paid_at_ab - $paid_at_ab_magister - $paid_at_ab_work;
        if ($paid_at_ab == 0) {
            $paid_at_ab_procent = 0;
        } else {
            $paid_at_ab_procent = (($paid_at_ab_work + $paid_at_ab_magister) * 100) / $paid_at_ab;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // АТ-ОВД
        $paid_at_ovd = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-ОВД'],
        ])
            ->count();
        $paid_at_ovd_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-ОВД'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_at_ovd_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-ОВД'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_at_ovd_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'АТ-ОВД'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $paid_at_ovd_work = $paid_at_ovd_work + $paid_at_ovd_direction;
        $paid_at_ovd_no_work = $paid_at_ovd - $paid_at_ovd_magister - $paid_at_ovd_work;
        if ($paid_at_ovd == 0) {
            $paid_at_ovd_procent = 0;
        } else {
            $paid_at_ovd_procent = (($paid_at_ovd_work + $paid_at_ovd_magister) * 100) / $paid_at_ovd;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // АТ ВСЕ //
        $paid_at = $paid_at_mx + $paid_at_av + $paid_at_ono + $paid_at_ab + $paid_at_ovd;
        $paid_at_magister = $paid_at_mx_magister + $paid_at_av_magister + $paid_at_ono_magister + $paid_at_ab_magister + $paid_at_ovd_magister;
        $paid_at_work = $paid_at_mx_work + $paid_at_av_work + $paid_at_ono_work + $paid_at_ab_work + $paid_at_ovd_work;
        $paid_at_no_work = $paid_at_mx_no_work + $paid_at_av_no_work + $paid_at_ono_no_work + $paid_at_ab_no_work + $paid_at_ovd_no_work;
        if ($paid_at == 0) {
            $paid_at_procent = 0;
        } else {
            $paid_at_procent = (($paid_at_work + $paid_at_magister) * 100) / $paid_at;
        }

        // ОП-ЛГ
        $paid_op_lg = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'ОП-ЛГ'],
        ])
            ->count();
        $paid_op_lg_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'ОП-ЛГ'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_op_lg_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'ОП-ЛГ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_op_lg_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'ОП-ЛГ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $paid_op_lg_work = $paid_op_lg_work + $paid_op_lg_direction;
        $paid_op_lg_no_work = $paid_op_lg - $paid_op_lg_magister - $paid_op_lg_work;
        if ($paid_op_lg == 0) {
            $paid_op_lg_procent = 0;
        } else {
            $paid_op_lg_procent = (($paid_op_lg_work + $paid_op_lg_magister) * 100) / $paid_op_lg;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // ОП
        $paid_op = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'ОП'],
        ])
            ->count();
        $paid_op_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'ОП'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_op_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'ОП'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_op_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'ОП'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $paid_op_work = $paid_op_work + $paid_op_direction;
        $paid_op_no_work = $paid_op - $paid_op_magister - $paid_op_work;
        if ($paid_op == 0) {
            $paid_op_procent = 0;
        } else {
            $paid_op_procent = (($paid_op_work + $paid_op_magister) * 100) / $paid_op;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // ОП ВСЕ //
        $paid_op_all = $paid_op_lg + $paid_op;
        $paid_op_all_magister = $paid_op_lg_magister + $paid_op_magister;
        $paid_op_all_work = $paid_op_lg_work + $paid_op_work;
        $paid_op_all_no_work = $paid_op_lg_no_work + $paid_op_no_work;
        if ($paid_op_all == 0) {
            $paid_op_all_procent = 0;
        } else {
            $paid_op_all_procent = (($paid_op_all_work + $paid_op_all_magister) * 100) / $paid_op_all;
        }

        // Д-ЛЭ
        $paid_d_le = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ЛЭ'],
        ])
            ->count();
        $paid_d_le_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ЛЭ'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_d_le_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ЛЭ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_d_le_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ЛЭ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $paid_d_le_work = $paid_d_le_work + $paid_d_le_direction;
        $paid_d_le_no_work = $paid_d_le - $paid_d_le_magister - $paid_d_le_work;
        if ($paid_d_le == 0) {
            $paid_d_le_procent = 0;
        } else {
            $paid_d_le_procent = (($paid_d_le_work + $paid_d_le_magister) * 100) / $paid_d_le;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // Д-МХ
        $paid_d_mx = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-МХ'],
        ])
            ->count();
        $paid_d_mx_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-МХ'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_d_mx_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-МХ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_d_mx_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-МХ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $paid_d_mx_work = $paid_d_mx_work + $paid_d_mx_direction;
        $paid_d_mx_no_work = $paid_d_mx - $paid_d_mx_magister - $paid_d_mx_work;
        if ($paid_d_mx == 0) {
            $paid_d_mx_procent = 0;
        } else {
            $paid_d_mx_procent = (($paid_d_mx_work + $paid_d_mx_magister) * 100) / $paid_d_mx;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // Д-АВ
        $paid_d_av = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-АВ'],
        ])
            ->count();
        $paid_d_av_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-АВ'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_d_av_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-АВ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_d_av_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-АВ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $paid_d_av_work = $paid_d_av_work + $paid_d_av_direction;
        $paid_d_av_no_work = $paid_d_av - $paid_d_av_magister - $paid_d_av_work;
        if ($paid_d_av == 0) {
            $paid_d_av_procent = 0;
        } else {
            $paid_d_av_procent = (($paid_d_av_work + $paid_d_av_magister) * 100) / $paid_d_av;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // Д-ОВД
        $paid_d_ovd = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОВД'],
        ])
            ->count();
        $paid_d_ovd_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОВД'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_d_ovd_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОВД'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_d_ovd_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОВД'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $paid_d_ovd_work = $paid_d_ovd_work + $paid_d_ovd_direction;
        $paid_d_ovd_no_work = $paid_d_ovd - $paid_d_ovd_magister - $paid_d_ovd_work;
        if ($paid_d_ovd == 0) {
            $paid_d_ovd_procent = 0;
        } else {
            $paid_d_ovd_procent = (($paid_d_ovd_work + $paid_d_ovd_magister) * 100) / $paid_d_ovd;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // Д-АБ
        $paid_d_ab = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-АБ'],
        ])
            ->count();
        $paid_d_ab_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-АБ'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_d_ab_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-АБ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_d_ab_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-АБ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $paid_d_ab_work = $paid_d_ab_work + $paid_d_ab_direction;
        $paid_d_ab_no_work = $paid_d_ab - $paid_d_ab_magister - $paid_d_ab_work;
        if ($paid_d_ab == 0) {
            $paid_d_ab_procent = 0;
        } else {
            $paid_d_ab_procent = (($paid_d_ab_work + $paid_d_ab_magister) * 100) / $paid_d_ab;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // Д-ОНО
        $paid_d_ono = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОНО'],
        ])
            ->count();
        $paid_d_ono_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОНО'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_d_ono_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОНО'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_d_ono_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОНО'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $paid_d_ono_work = $paid_d_ono_work + $paid_d_ono_direction;
        $paid_d_ono_no_work = $paid_d_ono - $paid_d_ono_magister - $paid_d_ono_work;
        if ($paid_d_ono == 0) {
            $paid_d_ono_procent = 0;
        } else {
            $paid_d_ono_procent = (($paid_d_ono_work + $paid_d_ono_magister) * 100) / $paid_d_ono;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // Д-АТ ВСЕ //
        $paid_dat = $paid_d_le + $paid_d_mx + $paid_d_av + $paid_d_ovd + $paid_d_ab + $paid_d_ono;
        $paid_dat_magister = $paid_d_le_magister + $paid_d_mx_magister + $paid_d_av_magister + $paid_d_ovd_magister + $paid_d_ab_magister + $paid_d_ono_magister;
        $paid_dat_work = $paid_d_le_work + $paid_d_mx_work + $paid_d_av_work + $paid_d_ovd_work + $paid_d_ab_work + $paid_d_ono_work;
        $paid_dat_no_work = $paid_d_le_no_work + $paid_d_mx_no_work + $paid_d_av_no_work + $paid_d_ovd_no_work + $paid_d_ab_no_work + $paid_d_ono_no_work;
        if ($paid_dat == 0) {
            $paid_dat_procent = 0;
        } else {
            $paid_dat_procent = (($paid_dat_work + $paid_dat_magister) * 100) / $paid_dat;
        }

        // Д-ОП
        $paid_d_op = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОП'],
        ])
            ->count();
        $paid_d_op_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОП'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_d_op_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОП'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_d_op_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОП'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $paid_d_op_work = $paid_d_op_work + $paid_d_op_direction;
        $paid_d_op_no_work = $paid_d_op - $paid_d_op_magister - $paid_d_op_work;
        if ($paid_d_op == 0) {
            $paid_d_op_procent = 0;
        } else {
            $paid_d_op_procent = (($paid_d_op_work + $paid_d_op_magister) * 100) / $paid_d_op;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // Д-ОП-ЛГ
        $paid_d_op_lg = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОП-ЛГ'],
        ])
            ->count();
        $paid_d_op_lg_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОП-ЛГ'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_d_op_lg_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОП-ЛГ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_d_op_lg_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'Д-ОП-ЛГ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $paid_d_op_lg_work = $paid_d_op_lg_work + $paid_d_op_lg_direction;
        $paid_d_op_lg_no_work = $paid_d_op_lg - $paid_d_op_lg_magister - $paid_d_op_lg_work;
        if ($paid_d_op_lg == 0) {
            $paid_d_op_lg_procent = 0;
        } else {
            $paid_d_op_lg_procent = (($paid_d_op_lg_work + $paid_d_op_lg_magister) * 100) / $paid_d_op_lg;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // Д-ОП ВСЕ //
        $paid_d_op_all = $paid_d_op + $paid_d_op_lg;
        $paid_d_op_all_magister = $paid_d_op_magister + $paid_d_op_lg_magister;
        $paid_d_op_all_work = $paid_d_op_work + $paid_d_op_lg_work;
        $paid_d_op_all_no_work = $paid_d_op_no_work + $paid_d_op_lg_no_work;
        if ($paid_d_op_all == 0) {
            $paid_d_op_all_procent = 0;
        } else {
            $paid_d_op_all_procent = (($paid_d_op_all_work + $paid_d_op_all_magister) * 100) / $paid_d_op_all;
        }

        // МП-АТ
        $paid_mp_at = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МП-АТ'],
        ])
            ->count();
        $paid_mp_at_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МП-АТ'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_mp_at_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МП-АТ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_mp_at_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МП-АТ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $paid_mp_at_work = $paid_mp_at_work + $paid_mp_at_direction;
        $paid_mp_at_no_work = $paid_mp_at - $paid_mp_at_magister - $paid_mp_at_work;
        if ($paid_mp_at == 0) {
            $paid_mp_at_procent = 0;
        } else {
            $paid_mp_at_procent = (($paid_mp_at_work + $paid_mp_at_magister) * 100) / $paid_mp_at;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // МП-ТУ
        $paid_mp_tu = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МП-ТУ'],
        ])
            ->count();
        $paid_mp_tu_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МП-ТУ'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_mp_tu_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МП-ТУ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_mp_tu_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МП-ТУ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $paid_mp_tu_work = $paid_mp_tu_work + $paid_mp_tu_direction;
        $paid_mp_tu_no_work = $paid_mp_tu - $paid_mp_tu_magister - $paid_mp_tu_work;
        if ($paid_mp_tu == 0) {
            $paid_mp_tu_procent = 0;
        } else {
            $paid_mp_tu_procent = (($paid_mp_tu_work + $paid_mp_tu_magister) * 100) / $paid_mp_tu;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // МНП-ТУ
        $paid_mnp_tu = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МНП-ТУ'],
        ])
            ->count();
        $paid_mnp_tu_magister = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МНП-ТУ'],
            ['magister', TRUE]
        ])
            ->count();
        $paid_mnp_tu_work = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МНП-ТУ'],
            ['work', '!=', NULL]
        ])
            ->count();
        $paid_mnp_tu_direction = $grad_year->where([
            ['form_study', 'платное'],
            ['unification', 'МНП-ТУ'],
            ['direction', TRUE],
            ['magister', FALSE],
            ['work', NULL]
        ])
            ->count();
        $paid_mnp_tu_work = $paid_mnp_tu_work + $paid_mnp_tu_direction;
        $paid_mnp_tu_no_work = $paid_mnp_tu - $paid_mnp_tu_magister - $paid_mnp_tu_work;
        if ($paid_mnp_tu == 0) {
            $paid_mnp_tu_procent = 0;
        } else {
            $paid_mnp_tu_procent = (($paid_mnp_tu_work + $paid_mnp_tu_magister) * 100) / $paid_mnp_tu;
        }

        if ($graduation_year != 0) {
            $grad_year = DB::table('graduates')
                ->where('graduation_year', $graduation_year);
        } elseif ($graduation_year == 0) {
            $grad_year = DB::table('graduates');
        }


        // ПЛАТНОЕ ВСЕ
        $paid_all = $paid_at + $paid_op_all + $paid_dat + $paid_d_op_all + $paid_mp_at + $paid_mp_tu + $paid_mnp_tu;
        $paid_all_magister = $paid_at_magister + $paid_op_all_magister + $paid_dat_magister + $paid_d_op_all_magister + $paid_mp_at_magister + $paid_mp_tu_magister + $paid_mnp_tu_magister;
        $paid_all_work = $paid_at_work + $paid_op_all_work + $paid_dat_work + $paid_d_op_all_work + $paid_mp_at_work + $paid_mp_tu_work + $paid_mnp_tu_work;
        $paid_all_no_work = $paid_at_no_work + $paid_op_all_no_work + $paid_dat_no_work + $paid_d_op_all_no_work + $paid_mp_at_no_work + $paid_mp_tu_no_work + $paid_mnp_tu_no_work;

        if ($paid_all == 0) {
            $paid_all_procent = 0;
        } else {
            $paid_all_procent = (($paid_all_work + $paid_all_magister) * 100) / $paid_all;
        }

        // ВСЕ
        $all = $grant_all + $paid_all;
        $all_magister = $grant_all_magister + $paid_all_magister;
        $all_work = $grant_all_work + $paid_all_work;
        $all_no_work = $grant_all_no_work + $paid_all_no_work;
        if ($all == 0) {
            $all_procent = 0;
        } else {
            $all_procent = (($all_work + $all_magister) * 100) / $all;
        }

        $today = now('Asia/Almaty');
        // Data Array
        $dataArray = [
            'today' => $today,
            'grant_at_mx' => $grant_at_mx,
            'grant_at_mx_magister' => $grant_at_mx_magister,
            'grant_at_mx_work' => $grant_at_mx_work,
            'grant_at_mx_no_work' => $grant_at_mx_no_work,
            'grant_at_mx_procent' => $grant_at_mx_procent,

            'grant_at_mv' => $grant_at_mv,
            'grant_at_mv_magister' => $grant_at_mv_magister,
            'grant_at_mv_work' => $grant_at_mv_work,
            'grant_at_mv_no_work' => $grant_at_mv_no_work,
            'grant_at_mv_procent' => $grant_at_mv_procent,

            'grant_at_ono' => $grant_at_ono,
            'grant_at_ono_magister' => $grant_at_ono_magister,
            'grant_at_ono_work' => $grant_at_ono_work,
            'grant_at_ono_no_work' => $grant_at_ono_no_work,
            'grant_at_ono_procent' => $grant_at_ono_procent,

            'grant_at_ovd' => $grant_at_ovd,
            'grant_at_ovd_magister' => $grant_at_ovd_magister,
            'grant_at_ovd_work' => $grant_at_ovd_work,
            'grant_at_ovd_no_work' => $grant_at_ovd_no_work,
            'grant_at_ovd_procent' => $grant_at_ovd_procent,

            'grant_at_ab' => $grant_at_ab,
            'grant_at_ab_magister' => $grant_at_ab_magister,
            'grant_at_ab_work' => $grant_at_ab_work,
            'grant_at_ab_no_work' => $grant_at_ab_no_work,
            'grant_at_ab_procent' => $grant_at_ab_procent,

            'grant_at' => $grant_at,
            'grant_at_magister' => $grant_at_magister,
            'grant_at_work' => $grant_at_work,
            'grant_at_no_work' => $grant_at_no_work,
            'grant_at_procent' => $grant_at_procent,

            'grant_op_lg' => $grant_op_lg,
            'grant_op_lg_magister' => $grant_op_lg_magister,
            'grant_op_lg_work' => $grant_op_lg_work,
            'grant_op_lg_no_work' => $grant_op_lg_no_work,
            'grant_op_lg_procent' => $grant_op_lg_procent,

            'grant_op' => $grant_op,
            'grant_op_magister' => $grant_op_magister,
            'grant_op_work' => $grant_op_work,
            'grant_op_no_work' => $grant_op_no_work,
            'grant_op_procent' => $grant_op_procent,

            'grant_op_all' => $grant_op_all,
            'grant_op_all_magister' => $grant_op_all_magister,
            'grant_op_all_work' => $grant_op_all_work,
            'grant_op_all_no_work' => $grant_op_all_no_work,
            'grant_op_all_procent' => $grant_op_all_procent,

            'grant_mnp_at' => $grant_mnp_at,
            'grant_mnp_at_magister' => $grant_mnp_at_magister,
            'grant_mnp_at_work' => $grant_mnp_at_work,
            'grant_mnp_at_no_work' => $grant_mnp_at_no_work,
            'grant_mnp_at_procent' => $grant_mnp_at_procent,

            'grant_mnp_tu' => $grant_mnp_tu,
            'grant_mnp_tu_magister' => $grant_mnp_tu_magister,
            'grant_mnp_tu_work' => $grant_mnp_tu_work,
            'grant_mnp_tu_no_work' => $grant_mnp_tu_no_work,
            'grant_mnp_tu_procent' => $grant_mnp_tu_procent,

            'grant_dat' => $grant_dat,
            'grant_dat_magister' => $grant_dat_magister,
            'grant_dat_work' => $grant_dat_work,
            'grant_dat_no_work' => $grant_dat_no_work,
            'grant_dat_procent' => $grant_dat_procent,

            'grant_all' => $grant_all,
            'grant_all_magister' => $grant_all_magister,
            'grant_all_work' => $grant_all_work,
            'grant_all_no_work' => $grant_all_no_work,
            'grant_all_procent' => $grant_all_procent,

            'paid_at_mx' => $paid_at_mx,
            'paid_at_mx_magister' => $paid_at_mx_magister,
            'paid_at_mx_work' => $paid_at_mx_work,
            'paid_at_mx_no_work' => $paid_at_mx_no_work,
            'paid_at_mx_procent' => $paid_at_mx_procent,

            'paid_at_av' => $paid_at_av,
            'paid_at_av_magister' => $paid_at_av_magister,
            'paid_at_av_work' => $paid_at_av_work,
            'paid_at_av_no_work' => $paid_at_av_no_work,
            'paid_at_av_procent' => $paid_at_av_procent,

            'paid_at_ono' => $paid_at_ono,
            'paid_at_ono_magister' => $paid_at_ono_magister,
            'paid_at_ono_work' => $paid_at_ono_work,
            'paid_at_ono_no_work' => $paid_at_ono_no_work,
            'paid_at_ono_procent' => $paid_at_ono_procent,

            'paid_at_ab' => $paid_at_ab,
            'paid_at_ab_magister' => $paid_at_ab_magister,
            'paid_at_ab_work' => $paid_at_ab_work,
            'paid_at_ab_no_work' => $paid_at_ab_no_work,
            'paid_at_ab_procent' => $paid_at_ab_procent,

            'paid_at_ovd' => $paid_at_ovd,
            'paid_at_ovd_magister' => $paid_at_ovd_magister,
            'paid_at_ovd_work' => $paid_at_ovd_work,
            'paid_at_ovd_no_work' => $paid_at_ovd_no_work,
            'paid_at_ovd_procent' => $paid_at_ovd_procent,

            'paid_at' => $paid_at,
            'paid_at_magister' => $paid_at_magister,
            'paid_at_work' => $paid_at_work,
            'paid_at_no_work' => $paid_at_no_work,
            'paid_at_procent' => $paid_at_procent,

            'paid_op_lg' => $paid_op_lg,
            'paid_op_lg_magister' => $paid_op_lg_magister,
            'paid_op_lg_work' => $paid_op_lg_work,
            'paid_op_lg_no_work' => $paid_op_lg_no_work,
            'paid_op_lg_procent' => $paid_op_lg_procent,

            'paid_op' => $paid_op,
            'paid_op_magister' => $paid_op_magister,
            'paid_op_work' => $paid_op_work,
            'paid_op_no_work' => $paid_op_no_work,
            'paid_op_procent' => $paid_op_procent,

            'paid_op_all' => $paid_op_all,
            'paid_op_all_magister' => $paid_op_all_magister,
            'paid_op_all_work' => $paid_op_all_work,
            'paid_op_all_no_work' => $paid_op_all_no_work,
            'paid_op_all_procent' => $paid_op_all_procent,

            'paid_d_le' => $paid_d_le,
            'paid_d_le_magister' => $paid_d_le_magister,
            'paid_d_le_work' => $paid_d_le_work,
            'paid_d_le_no_work' => $paid_d_le_no_work,
            'paid_d_le_procent' => $paid_d_le_procent,

            'paid_d_mx' => $paid_d_mx,
            'paid_d_mx_magister' => $paid_d_mx_magister,
            'paid_d_mx_work' => $paid_d_mx_work,
            'paid_d_mx_no_work' => $paid_d_mx_no_work,
            'paid_d_mx_procent' => $paid_d_mx_procent,

            'paid_d_av' => $paid_d_av,
            'paid_d_av_magister' => $paid_d_av_magister,
            'paid_d_av_work' => $paid_d_av_work,
            'paid_d_av_no_work' => $paid_d_av_no_work,
            'paid_d_av_procent' => $paid_d_av_procent,

            'paid_d_ovd' => $paid_d_ovd,
            'paid_d_ovd_magister' => $paid_d_ovd_magister,
            'paid_d_ovd_work' => $paid_d_ovd_work,
            'paid_d_ovd_no_work' => $paid_d_ovd_no_work,
            'paid_d_ovd_procent' => $paid_d_ovd_procent,

            'paid_d_ab' => $paid_d_ab,
            'paid_d_ab_magister' => $paid_d_ab_magister,
            'paid_d_ab_work' => $paid_d_ab_work,
            'paid_d_ab_no_work' => $paid_d_ab_no_work,
            'paid_d_ab_procent' => $paid_d_ab_procent,

            'paid_d_ono' => $paid_d_ono,
            'paid_d_ono_magister' => $paid_d_ono_magister,
            'paid_d_ono_work' => $paid_d_ono_work,
            'paid_d_ono_no_work' => $paid_d_ono_no_work,
            'paid_d_ono_procent' => $paid_d_ono_procent,

            'paid_dat' => $paid_dat,
            'paid_dat_magister' => $paid_dat_magister,
            'paid_dat_work' => $paid_dat_work,
            'paid_dat_no_work' => $paid_dat_no_work,
            'paid_dat_procent' => $paid_dat_procent,

            'paid_d_op' => $paid_d_op,
            'paid_d_op_magister' => $paid_d_op_magister,
            'paid_d_op_work' => $paid_d_op_work,
            'paid_d_op_no_work' => $paid_d_op_no_work,
            'paid_d_op_procent' => $paid_d_op_procent,

            'paid_d_op_lg' => $paid_d_op_lg,
            'paid_d_op_lg_magister' => $paid_d_op_lg_magister,
            'paid_d_op_lg_work' => $paid_d_op_lg_work,
            'paid_d_op_lg_no_work' => $paid_d_op_lg_no_work,
            'paid_d_op_lg_procent' => $paid_d_op_lg_procent,

            'paid_d_op_all' => $paid_d_op_all,
            'paid_d_op_all_magister' => $paid_d_op_all_magister,
            'paid_d_op_all_work' => $paid_d_op_all_work,
            'paid_d_op_all_no_work' => $paid_d_op_all_no_work,
            'paid_d_op_all_procent' => $paid_d_op_all_procent,

            'paid_mp_at' => $paid_mp_at,
            'paid_mp_at_magister' => $paid_mp_at_magister,
            'paid_mp_at_work' => $paid_mp_at_work,
            'paid_mp_at_no_work' => $paid_mp_at_no_work,
            'paid_mp_at_procent' => $paid_mp_at_procent,

            'paid_mp_tu' => $paid_mp_tu,
            'paid_mp_tu_magister' => $paid_mp_tu_magister,
            'paid_mp_tu_work' => $paid_mp_tu_work,
            'paid_mp_tu_no_work' => $paid_mp_tu_no_work,
            'paid_mp_tu_procent' => $paid_mp_tu_procent,

            'paid_mnp_tu' => $paid_mnp_tu,
            'paid_mnp_tu_magister' => $paid_mnp_tu_magister,
            'paid_mnp_tu_work' => $paid_mnp_tu_work,
            'paid_mnp_tu_no_work' => $paid_mnp_tu_no_work,
            'paid_mnp_tu_procent' => $paid_mnp_tu_procent,

            'paid_all' => $paid_all,
            'paid_all_magister' => $paid_all_magister,
            'paid_all_work' => $paid_all_work,
            'paid_all_no_work' => $paid_all_no_work,
            'paid_all_procent' => $paid_all_procent,

            'all' => $all,
            'all_magister' => $all_magister,
            'all_work' => $all_work,
            'all_no_work' => $all_no_work,
            'all_procent' => $all_procent,

            'graduation_year' => $graduation_year,
        ];

        $pdfName = 'Отчёт по выпускникам на ' . date('d.m.Y h:i', strtotime($today)) . '.pdf';
        $pdf = PDF::loadView('admin.graduate.report.pdf', $dataArray)->setOptions(['default-font' => 'sans-serif']);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download($pdfName);
    }

    public function index_new()
    {
        $dataBachInzh = DB::table('graduates')
            ->select(
                DB::raw('"" AS num_row,
                "Направление: Инженерия и инженерное дело" as speciality,
                sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe,
                sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot,
                count(id) as vse,
                sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant,
                sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn,
                sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot,
                sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
                count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
                concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
                "" as graduate_status,
                sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw("year(grad_year)=2022 and speciality in ('Техническая эксплуатация летательных аппаратов и двигателей (механик)', 'Техническая эксплуатация систем авионики летательных аппаратов (авионик)',
            'Обслуживание наземного радиоэлектронного оборудования аэропортов', 'Обеспечение авиационной безопасности', 'Организация аэропортовой деятельности',
            'Обслуживание воздушного движения и аэронавигационное обеспечение полетов (авиадиспетчер)', 'Летная эксплуатация гражданских самолетов (пилот)', 'Летная эксплуатация гражданских вертолетов (пилот)')
            ")
            ->where('type', '=', "1")
            ->get();

        $dataBachB067 = DB::table('graduates')
            ->select(
                DB::raw('"" AS num_row,
                "B067 - Воздушный транспорт и технологии" as speciality,
                sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe,
                sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot,
                count(id) as vse,
                sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant,
                sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn,
                sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot,
                sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
                count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
                concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
                "" as graduate_status,
                sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw("year(grad_year)=2022 and speciality in ('Техническая эксплуатация летательных аппаратов и двигателей (механик)', 'Техническая эксплуатация систем авионики летательных аппаратов (авионик)',
            'Обслуживание наземного радиоэлектронного оборудования аэропортов', 'Обеспечение авиационной безопасности', 'Организация аэропортовой деятельности')
            ")
            ->where('type', '=', "1")
            ->get();


        $dataBachB067op = DB::table('graduates')
            ->select(
                DB::raw('ROW_NUMBER() OVER(ORDER BY speciality) AS num_row,
                speciality,
                sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe,
                sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot,
                count(id) as vse,
                sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant,
                sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn,
                sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot,
                sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
                count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
                concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
                "" as graduate_status,
                sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw("year(grad_year)=2022 and speciality in ('Техническая эксплуатация летательных аппаратов и двигателей (механик)', 'Техническая эксплуатация систем авионики летательных аппаратов (авионик)',
            'Обслуживание наземного радиоэлектронного оборудования аэропортов', 'Обеспечение авиационной безопасности', 'Организация аэропортовой деятельности')
            ")
            ->where('type', '=', "1")
            ->groupBy('speciality')
            ->orderBy('speciality')
            ->get();

            $dataBachB167 = DB::table('graduates')
            ->select(
                DB::raw('"" AS num_row,
                "B167 - Летная эксплуатация летательных аппаратов и двигателей" as speciality,
                sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe,
                sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot,
                count(id) as vse,
                sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant,
                sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn,
                sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot,
                sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
                count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
                concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
                "" as graduate_status,
                sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw("year(grad_year)=2022 and speciality in ('Обслуживание воздушного движения и аэронавигационное обеспечение полетов (авиадиспетчер)', 'Летная эксплуатация гражданских самолетов (пилот)',
            'Летная эксплуатация гражданских вертолетов (пилот)')
            ")
            ->where('type', '=', "1")
            ->get();

            $dataBachB167op = DB::table('graduates')
            ->select(
                DB::raw('ROW_NUMBER() OVER(ORDER BY speciality) AS num_row,
                speciality,
                sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe,
                sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot,
                count(id) as vse,
                sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant,
                sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn,
                sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot,
                sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
                count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
                concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
                "" as graduate_status,
                sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw("year(grad_year)=2022 and speciality in ('Обслуживание воздушного движения и аэронавигационное обеспечение полетов (авиадиспетчер)', 'Летная эксплуатация гражданских самолетов (пилот)',
            'Летная эксплуатация гражданских вертолетов (пилот)')
            ")
            ->where('type', '=', "1")
            ->groupBy('speciality')
            ->orderBy('speciality')
            ->get();

            $dataBachTransport = DB::table('graduates')
            ->select(
                DB::raw('"" AS num_row,
                "Транспортные услуги" as speciality,
                sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe,
                sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot,
                count(id) as vse,
                sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant,
                sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn,
                sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot,
                sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
                count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
                concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
                "" as graduate_status,
                sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw("year(grad_year)=2022 and speciality in ('Организация авиационных перевозок', 'Логистика на транспорте')
            ")
            ->where('type', '=', "1")
            ->get();

            $dataBachTransportOp = DB::table('graduates')
            ->select(
                DB::raw('ROW_NUMBER() OVER(ORDER BY speciality) AS num_row,
                speciality,
                sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe,
                sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot,
                count(id) as vse,
                sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant,
                sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn,
                sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot,
                sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
                count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
                concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
                "" as graduate_status,
                sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw("year(grad_year)=2022 and speciality in ('Организация авиационных перевозок', 'Логистика на транспорте')
            ")
            ->where('type', '=', "1")
            ->groupBy('speciality')
            ->orderBy('speciality')
            ->get();



        $dataBachAll = DB::table('graduates')
            ->select(
                DB::raw('"" AS num_row'),
                DB::raw('"Итого" as speciality'),
                DB::raw('sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe'),
                DB::raw('sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot'),
                DB::raw('count(id) as vse'),
                DB::raw('sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant'),
                DB::raw('sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn'),
                DB::raw('sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot'),
                DB::raw('sum(CASE WHEN work=1 then 1 else 0 end) as work_vse'),
                DB::raw('count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse'),
                DB::raw('concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent'),
                DB::raw('"" as graduate_status'),
                DB::raw('sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw('year(grad_year)=2022')
            ->where('type', '=', "1")
            ->get();

        $dataMag = DB::table('graduates')
            ->select(
                DB::raw('ROW_NUMBER() OVER(ORDER BY op_group) AS num_row'),
                'op_group',
                DB::raw('"" as ochnoe'),
                DB::raw('"" as dot'),
                DB::raw('count(id) as vse'),
                DB::raw('sum(CASE WHEN work=1 and form_study="грант" then 1 else 0 end) as work_grant'),
                DB::raw('sum(CASE WHEN work=1 and form_study="платное" then 1 else 0 end) as work_platn'),
                DB::raw('"" as work_dot'),
                DB::raw('sum(CASE WHEN work=1 then 1 else 0 end) as work_vse'),
                DB::raw('count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse'),
                DB::raw('concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent'),
                DB::raw('"" as graduate_status'),
                DB::raw('sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw('year(grad_year)=2022')
            ->where('type', '=', "2")
            ->groupBy('op_group')
            ->orderBy('op_group')
            ->get();

        $dataMagAll = DB::table('graduates')
            ->select(
                DB::raw('"" AS num_row'),
                DB::raw('"Итого" as op_group'),
                DB::raw('"" as ochnoe'),
                DB::raw('"" as dot'),
                DB::raw('count(id) as vse'),
                DB::raw('sum(CASE WHEN work=1 and form_study="грант" then 1 else 0 end) as work_grant'),
                DB::raw('sum(CASE WHEN work=1 and form_study="платное" then 1 else 0 end) as work_platn'),
                DB::raw('"" as work_dot'),
                DB::raw('sum(CASE WHEN work=1 then 1 else 0 end) as work_vse'),
                DB::raw('count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse'),
                DB::raw('concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent'),
                DB::raw('"" as graduate_status'),
                DB::raw('sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw('year(grad_year)=2022')
            ->where('type', '=', "2")
            ->get();

        $dataAll = DB::table('graduates')
            ->select(
                DB::raw('"" AS num_row,
                "Итого по АГА" as op_group,
                "" as ochnoe,
                 "" as dot,
                count(id) as vse,
                sum(CASE WHEN work=1 and form_study="грант" then 1 else 0 end) as work_grant,
                sum(CASE WHEN work=1 and form_study="платное" then 1 else 0 end) as work_platn,
                "" as work_dot,
                sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
                count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
                concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
                "" as graduate_status,
                sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw('type in (1,2) and year(grad_year)=2022')
            ->get();

        $dataArray = [
            'dataBachInzh' => $dataBachInzh,
            'dataBachB067' => $dataBachB067,
            'dataBachB067op' => $dataBachB067op,
            'dataBachB167' => $dataBachB167,
            'dataBachB167op' => $dataBachB167op,
            'dataBachTransport' => $dataBachTransport,
            'dataBachTransportOp' => $dataBachTransportOp,
            'dataBachAll' => $dataBachAll,
            'dataMag' => $dataMag,
            'dataMagAll' => $dataMagAll,
            'dataAll' => $dataAll,

        ];
        return view('admin.graduate.report.index_new', $dataArray);
    }

    public function pdf_new()
    {

        $today = now('Asia/Almaty');

        $dataBachInzh = DB::table('graduates')
            ->select(
                DB::raw('"" AS num_row,
                "Направление: Инженерия и инженерное дело" as speciality,
                sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe,
                sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot,
                count(id) as vse,
                sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant,
                sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn,
                sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot,
                sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
                count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
                concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
                "" as graduate_status,
                sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw("year(grad_year)=2022 and speciality in ('Техническая эксплуатация летательных аппаратов и двигателей (механик)', 'Техническая эксплуатация систем авионики летательных аппаратов (авионик)',
            'Обслуживание наземного радиоэлектронного оборудования аэропортов', 'Обеспечение авиационной безопасности', 'Организация аэропортовой деятельности',
            'Обслуживание воздушного движения и аэронавигационное обеспечение полетов (авиадиспетчер)', 'Летная эксплуатация гражданских самолетов (пилот)', 'Летная эксплуатация гражданских вертолетов (пилот)')
            ")
            ->where('type', '=', "1")
            ->get();

        $dataBachB067 = DB::table('graduates')
            ->select(
                DB::raw('"" AS num_row,
                "B067 - Воздушный транспорт и технологии" as speciality,
                sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe,
                sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot,
                count(id) as vse,
                sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant,
                sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn,
                sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot,
                sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
                count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
                concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
                "" as graduate_status,
                sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw("year(grad_year)=2022 and speciality in ('Техническая эксплуатация летательных аппаратов и двигателей (механик)', 'Техническая эксплуатация систем авионики летательных аппаратов (авионик)',
            'Обслуживание наземного радиоэлектронного оборудования аэропортов', 'Обеспечение авиационной безопасности', 'Организация аэропортовой деятельности')
            ")
            ->where('type', '=', "1")
            ->get();


        $dataBachB067op = DB::table('graduates')
            ->select(
                DB::raw('ROW_NUMBER() OVER(ORDER BY speciality) AS num_row,
                speciality,
                sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe,
                sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot,
                count(id) as vse,
                sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant,
                sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn,
                sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot,
                sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
                count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
                concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
                "" as graduate_status,
                sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw("year(grad_year)=2022 and speciality in ('Техническая эксплуатация летательных аппаратов и двигателей (механик)', 'Техническая эксплуатация систем авионики летательных аппаратов (авионик)',
            'Обслуживание наземного радиоэлектронного оборудования аэропортов', 'Обеспечение авиационной безопасности', 'Организация аэропортовой деятельности')
            ")
            ->where('type', '=', "1")
            ->groupBy('speciality')
            ->orderBy('speciality')
            ->get();

            $dataBachB167 = DB::table('graduates')
            ->select(
                DB::raw('"" AS num_row,
                "B167 - Летная эксплуатация летательных аппаратов и двигателей" as speciality,
                sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe,
                sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot,
                count(id) as vse,
                sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant,
                sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn,
                sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot,
                sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
                count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
                concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
                "" as graduate_status,
                sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw("year(grad_year)=2022 and speciality in ('Обслуживание воздушного движения и аэронавигационное обеспечение полетов (авиадиспетчер)', 'Летная эксплуатация гражданских самолетов (пилот)',
            'Летная эксплуатация гражданских вертолетов (пилот)')
            ")
            ->where('type', '=', "1")
            ->get();

            $dataBachB167op = DB::table('graduates')
            ->select(
                DB::raw('ROW_NUMBER() OVER(ORDER BY speciality) AS num_row,
                speciality,
                sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe,
                sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot,
                count(id) as vse,
                sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant,
                sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn,
                sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot,
                sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
                count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
                concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
                "" as graduate_status,
                sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw("year(grad_year)=2022 and speciality in ('Обслуживание воздушного движения и аэронавигационное обеспечение полетов (авиадиспетчер)', 'Летная эксплуатация гражданских самолетов (пилот)',
            'Летная эксплуатация гражданских вертолетов (пилот)')
            ")
            ->where('type', '=', "1")
            ->groupBy('speciality')
            ->orderBy('speciality')
            ->get();

            $dataBachTransport = DB::table('graduates')
            ->select(
                DB::raw('"" AS num_row,
                "Транспортные услуги" as speciality,
                sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe,
                sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot,
                count(id) as vse,
                sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant,
                sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn,
                sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot,
                sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
                count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
                concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
                "" as graduate_status,
                sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw("year(grad_year)=2022 and speciality in ('Организация авиационных перевозок', 'Логистика на транспорте')
            ")
            ->where('type', '=', "1")
            ->get();

            $dataBachTransportOp = DB::table('graduates')
            ->select(
                DB::raw('ROW_NUMBER() OVER(ORDER BY speciality) AS num_row,
                speciality,
                sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe,
                sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot,
                count(id) as vse,
                sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant,
                sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn,
                sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot,
                sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
                count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
                concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
                "" as graduate_status,
                sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw("year(grad_year)=2022 and speciality in ('Организация авиационных перевозок', 'Логистика на транспорте')
            ")
            ->where('type', '=', "1")
            ->groupBy('speciality')
            ->orderBy('speciality')
            ->get();

        $dataBachAll = DB::table('graduates')
            ->select(
                DB::raw('"" AS num_row'),
                DB::raw('"Итого" as speciality'),
                DB::raw('sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe'),
                DB::raw('sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot'),
                DB::raw('count(id) as vse'),
                DB::raw('sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant'),
                DB::raw('sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn'),
                DB::raw('sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot'),
                DB::raw('sum(CASE WHEN work=1 then 1 else 0 end) as work_vse'),
                DB::raw('count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse'),
                DB::raw('concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent'),
                DB::raw('"" as graduate_status'),
                DB::raw('sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw('year(grad_year)=2022')
            ->where('type', '=', "1")
            ->get();

        $dataMag = DB::table('graduates')
            ->select(
                DB::raw('ROW_NUMBER() OVER(ORDER BY op_group) AS num_row'),
                'op_group',
                DB::raw('"" as ochnoe'),
                DB::raw('"" as dot'),
                DB::raw('count(id) as vse'),
                DB::raw('sum(CASE WHEN work=1 and form_study="грант" then 1 else 0 end) as work_grant'),
                DB::raw('sum(CASE WHEN work=1 and form_study="платное" then 1 else 0 end) as work_platn'),
                DB::raw('"" as work_dot'),
                DB::raw('sum(CASE WHEN work=1 then 1 else 0 end) as work_vse'),
                DB::raw('count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse'),
                DB::raw('concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent'),
                DB::raw('"" as graduate_status'),
                DB::raw('sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw('year(grad_year)=2022')
            ->where('type', '=', "2")
            ->groupBy('op_group')
            ->orderBy('op_group')
            ->get();

        $dataMagAll = DB::table('graduates')
            ->select(
                DB::raw('"" AS num_row'),
                DB::raw('"Итого" as op_group'),
                DB::raw('"" as ochnoe'),
                DB::raw('"" as dot'),
                DB::raw('count(id) as vse'),
                DB::raw('sum(CASE WHEN work=1 and form_study="грант" then 1 else 0 end) as work_grant'),
                DB::raw('sum(CASE WHEN work=1 and form_study="платное" then 1 else 0 end) as work_platn'),
                DB::raw('"" as work_dot'),
                DB::raw('sum(CASE WHEN work=1 then 1 else 0 end) as work_vse'),
                DB::raw('count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse'),
                DB::raw('concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent'),
                DB::raw('"" as graduate_status'),
                DB::raw('sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw('year(grad_year)=2022')
            ->where('type', '=', "2")
            ->get();

        $dataAll = DB::table('graduates')
            ->select(
                DB::raw('"" AS num_row,
                "Итого по АГА" as op_group,
                "" as ochnoe,
                 "" as dot,
                count(id) as vse,
                sum(CASE WHEN work=1 and form_study="грант" then 1 else 0 end) as work_grant,
                sum(CASE WHEN work=1 and form_study="платное" then 1 else 0 end) as work_platn,
                "" as work_dot,
                sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
                count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
                concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
                "" as graduate_status,
                sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw('type in (1,2) and year(grad_year)=2022')
            ->get();

        $dataArray = [
            'today' => $today,
            'dataBachInzh' => $dataBachInzh,
            'dataBachB067' => $dataBachB067,
            'dataBachB067op' => $dataBachB067op,
            'dataBachB167' => $dataBachB167,
            'dataBachB167op' => $dataBachB167op,
            'dataBachTransport' => $dataBachTransport,
            'dataBachTransportOp' => $dataBachTransportOp,
            'dataBachAll' => $dataBachAll,
            'dataMag' => $dataMag,
            'dataMagAll' => $dataMagAll,
            'dataAll' => $dataAll
        ];

        $pdfName = 'Отчёт по выпускникам на ' . date('d.m.Y h:i', strtotime($today)) . '.pdf';
        $pdf = PDF::loadView('admin.graduate.report.pdf_new', $dataArray)->setOptions(['default-font' => 'sans-serif']);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download($pdfName);
    }

    public function excel()
    {

        $today = now('Asia/Almaty');

        $dataBachInzh = DB::table('graduates')
        ->select(
            DB::raw('"" AS num_row,
            "Направление: Инженерия и инженерное дело" as speciality,
            sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe,
            sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot,
            count(id) as vse,
            sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant,
            sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn,
            sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot,
            sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
            count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
            concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
            "" as graduate_status,
            sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
        )
        ->whereRaw("year(grad_year)=2022 and speciality in ('Техническая эксплуатация летательных аппаратов и двигателей (механик)', 'Техническая эксплуатация систем авионики летательных аппаратов (авионик)',
        'Обслуживание наземного радиоэлектронного оборудования аэропортов', 'Обеспечение авиационной безопасности', 'Организация аэропортовой деятельности',
        'Обслуживание воздушного движения и аэронавигационное обеспечение полетов (авиадиспетчер)', 'Летная эксплуатация гражданских самолетов (пилот)', 'Летная эксплуатация гражданских вертолетов (пилот)')
        ")
        ->where('type', '=', "1")
        ->get();

    $dataBachB067 = DB::table('graduates')
        ->select(
            DB::raw('"" AS num_row,
            "B067 - Воздушный транспорт и технологии" as speciality,
            sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe,
            sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot,
            count(id) as vse,
            sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant,
            sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn,
            sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot,
            sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
            count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
            concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
            "" as graduate_status,
            sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
        )
        ->whereRaw("year(grad_year)=2022 and speciality in ('Техническая эксплуатация летательных аппаратов и двигателей (механик)', 'Техническая эксплуатация систем авионики летательных аппаратов (авионик)',
        'Обслуживание наземного радиоэлектронного оборудования аэропортов', 'Обеспечение авиационной безопасности', 'Организация аэропортовой деятельности')
        ")
        ->where('type', '=', "1")
        ->get();


    $dataBachB067op = DB::table('graduates')
        ->select(
            DB::raw('ROW_NUMBER() OVER(ORDER BY speciality) AS num_row,
            speciality,
            sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe,
            sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot,
            count(id) as vse,
            sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant,
            sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn,
            sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot,
            sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
            count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
            concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
            "" as graduate_status,
            sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
        )
        ->whereRaw("year(grad_year)=2022 and speciality in ('Техническая эксплуатация летательных аппаратов и двигателей (механик)', 'Техническая эксплуатация систем авионики летательных аппаратов (авионик)',
        'Обслуживание наземного радиоэлектронного оборудования аэропортов', 'Обеспечение авиационной безопасности', 'Организация аэропортовой деятельности')
        ")
        ->where('type', '=', "1")
        ->groupBy('speciality')
        ->orderBy('speciality')
        ->get();

        $dataBachB167 = DB::table('graduates')
        ->select(
            DB::raw('"" AS num_row,
            "B167 - Летная эксплуатация летательных аппаратов и двигателей" as speciality,
            sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe,
            sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot,
            count(id) as vse,
            sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant,
            sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn,
            sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot,
            sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
            count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
            concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
            "" as graduate_status,
            sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
        )
        ->whereRaw("year(grad_year)=2022 and speciality in ('Обслуживание воздушного движения и аэронавигационное обеспечение полетов (авиадиспетчер)', 'Летная эксплуатация гражданских самолетов (пилот)',
        'Летная эксплуатация гражданских вертолетов (пилот)')
        ")
        ->where('type', '=', "1")
        ->get();

        $dataBachB167op = DB::table('graduates')
        ->select(
            DB::raw('ROW_NUMBER() OVER(ORDER BY speciality) AS num_row,
            speciality,
            sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe,
            sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot,
            count(id) as vse,
            sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant,
            sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn,
            sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot,
            sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
            count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
            concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
            "" as graduate_status,
            sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
        )
        ->whereRaw("year(grad_year)=2022 and speciality in ('Обслуживание воздушного движения и аэронавигационное обеспечение полетов (авиадиспетчер)', 'Летная эксплуатация гражданских самолетов (пилот)',
        'Летная эксплуатация гражданских вертолетов (пилот)')
        ")
        ->where('type', '=', "1")
        ->groupBy('speciality')
        ->orderBy('speciality')
        ->get();

        $dataBachTransport = DB::table('graduates')
        ->select(
            DB::raw('"" AS num_row,
            "Транспортные услуги" as speciality,
            sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe,
            sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot,
            count(id) as vse,
            sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant,
            sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn,
            sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot,
            sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
            count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
            concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
            "" as graduate_status,
            sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
        )
        ->whereRaw("year(grad_year)=2022 and speciality in ('Организация авиационных перевозок', 'Логистика на транспорте')
        ")
        ->where('type', '=', "1")
        ->get();

        $dataBachTransportOp = DB::table('graduates')
        ->select(
            DB::raw('ROW_NUMBER() OVER(ORDER BY speciality) AS num_row,
            speciality,
            sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe,
            sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot,
            count(id) as vse,
            sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant,
            sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn,
            sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot,
            sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
            count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
            concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
            "" as graduate_status,
            sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
        )
        ->whereRaw("year(grad_year)=2022 and speciality in ('Организация авиационных перевозок', 'Логистика на транспорте')
        ")
        ->where('type', '=', "1")
        ->groupBy('speciality')
        ->orderBy('speciality')
        ->get();

        $dataBachAll = DB::table('graduates')
            ->select(
                DB::raw('"" AS num_row'),
                DB::raw('"Итого" as speciality'),
                DB::raw('sum(CASE WHEN edu_form="очное" then 1 else 0 end) as ochnoe'),
                DB::raw('sum(CASE WHEN edu_form="очное с применением ДОТ" then 1 else 0 end) as dot'),
                DB::raw('count(id) as vse'),
                DB::raw('sum(CASE WHEN work=1 and form_study="грант" and edu_form="очное" then 1 else 0 end) as work_grant'),
                DB::raw('sum(CASE WHEN work=1 and form_study="платное" and edu_form="очное" then 1 else 0 end) as work_platn'),
                DB::raw('sum(CASE WHEN work=1 and edu_form="очное с применением ДОТ" then 1 else 0 end) as work_dot'),
                DB::raw('sum(CASE WHEN work=1 then 1 else 0 end) as work_vse'),
                DB::raw('count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse'),
                DB::raw('concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent'),
                DB::raw('"" as graduate_status'),
                DB::raw('sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw('year(grad_year)=2022')
            ->where('type', '=', "1")
            ->get();

        $dataMag = DB::table('graduates')
            ->select(
                DB::raw('ROW_NUMBER() OVER(ORDER BY op_group) AS num_row'),
                'op_group',
                DB::raw('"" as ochnoe'),
                DB::raw('"" as dot'),
                DB::raw('count(id) as vse'),
                DB::raw('sum(CASE WHEN work=1 and form_study="грант" then 1 else 0 end) as work_grant'),
                DB::raw('sum(CASE WHEN work=1 and form_study="платное" then 1 else 0 end) as work_platn'),
                DB::raw('"" as work_dot'),
                DB::raw('sum(CASE WHEN work=1 then 1 else 0 end) as work_vse'),
                DB::raw('count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse'),
                DB::raw('concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent'),
                DB::raw('"" as graduate_status'),
                DB::raw('sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw('year(grad_year)=2022')
            ->where('type', '=', "2")
            ->groupBy('op_group')
            ->orderBy('op_group')
            ->get();

        $dataMagAll = DB::table('graduates')
            ->select(
                DB::raw('"" AS num_row'),
                DB::raw('"Итого" as op_group'),
                DB::raw('"" as ochnoe'),
                DB::raw('"" as dot'),
                DB::raw('count(id) as vse'),
                DB::raw('sum(CASE WHEN work=1 and form_study="грант" then 1 else 0 end) as work_grant'),
                DB::raw('sum(CASE WHEN work=1 and form_study="платное" then 1 else 0 end) as work_platn'),
                DB::raw('"" as work_dot'),
                DB::raw('sum(CASE WHEN work=1 then 1 else 0 end) as work_vse'),
                DB::raw('count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse'),
                DB::raw('concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent'),
                DB::raw('"" as graduate_status'),
                DB::raw('sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw('year(grad_year)=2022')
            ->where('type', '=', "2")
            ->get();

        $dataAll = DB::table('graduates')
            ->select(
                DB::raw('"" AS num_row,
                "Итого по АГА" as op_group,
                "" as ochnoe,
                 "" as dot,
                count(id) as vse,
                sum(CASE WHEN work=1 and form_study="грант" then 1 else 0 end) as work_grant,
                sum(CASE WHEN work=1 and form_study="платное" then 1 else 0 end) as work_platn,
                "" as work_dot,
                sum(CASE WHEN work=1 then 1 else 0 end) as work_vse,
                count(id)-sum(CASE WHEN work=1 then 1 else 0 end) as notwork_vse,
                concat_ws("",round(sum(CASE WHEN work=1 then 1 else 0 end)/count(id)*100),"%") as percent,
                "" as graduate_status,
                sum(CASE WHEN continue_education<>0 then 1 else 0 end) as magister')
            )
            ->whereRaw('type in (1,2) and year(grad_year)=2022')
            ->get();


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->mergeCells('A1:A2');
        $sheet->mergeCells('B1:B2');
        $sheet->mergeCells('C1:C2');
        $sheet->mergeCells('D1:D2');
        $sheet->mergeCells('E1:E2');
        $sheet->mergeCells('F1:J1');
        $sheet->mergeCells('K1:K2');

        $sheet->setCellValue('A1', '№ п/п');
        $sheet->setCellValue('B1', 'Образовательная программа');
        $sheet->setCellValue('C1', 'Очная форма обучения');
        $sheet->setCellValue('D1', 'ДОТ');
        $sheet->setCellValue('E1', 'Выпуск 2022');
        $sheet->setCellValue('F1', 'Трудоустроены');
        $sheet->setCellValue('K1', 'Не трудоустроены');
        $sheet->setCellValue('F2', 'грант');
        $sheet->setCellValue('G2', 'платное');
        $sheet->setCellValue('H2', 'ДОТ');
        $sheet->setCellValue('I2', 'Всего');
        $sheet->setCellValue('J2', '%');

        $sheet->setCellValue('B18', 'Магистратура');

        $sn = 3;
        foreach ($dataBachInzh as $item) {
            $sheet->setCellValue('A' . $sn, $item->num_row);
            $sheet->setCellValue('B' . $sn, $item->speciality);
            $sheet->setCellValue('C' . $sn, $item->ochnoe);
            $sheet->setCellValue('D' . $sn, $item->dot);
            $sheet->setCellValue('E' . $sn, $item->vse);
            $sheet->setCellValue('F' . $sn, $item->work_grant);
            $sheet->setCellValue('G' . $sn, $item->work_platn);
            $sheet->setCellValue('H' . $sn, $item->work_dot);
            $sheet->setCellValue('I' . $sn, $item->work_vse);
            $sheet->setCellValue('J' . $sn, $item->percent);
            $sheet->setCellValue('K' . $sn, $item->notwork_vse);
            $sn++;
        }
        foreach ($dataBachB067 as $item) {
            $sheet->setCellValue('A' . $sn, $item->num_row);
            $sheet->setCellValue('B' . $sn, $item->speciality);
            $sheet->setCellValue('C' . $sn, $item->ochnoe);
            $sheet->setCellValue('D' . $sn, $item->dot);
            $sheet->setCellValue('E' . $sn, $item->vse);
            $sheet->setCellValue('F' . $sn, $item->work_grant);
            $sheet->setCellValue('G' . $sn, $item->work_platn);
            $sheet->setCellValue('H' . $sn, $item->work_dot);
            $sheet->setCellValue('I' . $sn, $item->work_vse);
            $sheet->setCellValue('J' . $sn, $item->percent);
            $sheet->setCellValue('K' . $sn, $item->notwork_vse);
            $sn++;
        }
        foreach ($dataBachB067op as $item) {
            $sheet->setCellValue('A' . $sn, $item->num_row);
            $sheet->setCellValue('B' . $sn, $item->speciality);
            $sheet->setCellValue('C' . $sn, $item->ochnoe);
            $sheet->setCellValue('D' . $sn, $item->dot);
            $sheet->setCellValue('E' . $sn, $item->vse);
            $sheet->setCellValue('F' . $sn, $item->work_grant);
            $sheet->setCellValue('G' . $sn, $item->work_platn);
            $sheet->setCellValue('H' . $sn, $item->work_dot);
            $sheet->setCellValue('I' . $sn, $item->work_vse);
            $sheet->setCellValue('J' . $sn, $item->percent);
            $sheet->setCellValue('K' . $sn, $item->notwork_vse);
            $sn++;
        }
        foreach ($dataBachB167 as $item) {
            $sheet->setCellValue('A' . $sn, $item->num_row);
            $sheet->setCellValue('B' . $sn, $item->speciality);
            $sheet->setCellValue('C' . $sn, $item->ochnoe);
            $sheet->setCellValue('D' . $sn, $item->dot);
            $sheet->setCellValue('E' . $sn, $item->vse);
            $sheet->setCellValue('F' . $sn, $item->work_grant);
            $sheet->setCellValue('G' . $sn, $item->work_platn);
            $sheet->setCellValue('H' . $sn, $item->work_dot);
            $sheet->setCellValue('I' . $sn, $item->work_vse);
            $sheet->setCellValue('J' . $sn, $item->percent);
            $sheet->setCellValue('K' . $sn, $item->notwork_vse);
            $sn++;
        }
        foreach ($dataBachB167op as $item) {
            $sheet->setCellValue('A' . $sn, $item->num_row);
            $sheet->setCellValue('B' . $sn, $item->speciality);
            $sheet->setCellValue('C' . $sn, $item->ochnoe);
            $sheet->setCellValue('D' . $sn, $item->dot);
            $sheet->setCellValue('E' . $sn, $item->vse);
            $sheet->setCellValue('F' . $sn, $item->work_grant);
            $sheet->setCellValue('G' . $sn, $item->work_platn);
            $sheet->setCellValue('H' . $sn, $item->work_dot);
            $sheet->setCellValue('I' . $sn, $item->work_vse);
            $sheet->setCellValue('J' . $sn, $item->percent);
            $sheet->setCellValue('K' . $sn, $item->notwork_vse);
            $sn++;
        }
        foreach ($dataBachTransport as $item) {
            $sheet->setCellValue('A' . $sn, $item->num_row);
            $sheet->setCellValue('B' . $sn, $item->speciality);
            $sheet->setCellValue('C' . $sn, $item->ochnoe);
            $sheet->setCellValue('D' . $sn, $item->dot);
            $sheet->setCellValue('E' . $sn, $item->vse);
            $sheet->setCellValue('F' . $sn, $item->work_grant);
            $sheet->setCellValue('G' . $sn, $item->work_platn);
            $sheet->setCellValue('H' . $sn, $item->work_dot);
            $sheet->setCellValue('I' . $sn, $item->work_vse);
            $sheet->setCellValue('J' . $sn, $item->percent);
            $sheet->setCellValue('K' . $sn, $item->notwork_vse);
            $sn++;
        }
        foreach ($dataBachTransportOp as $item) {
            $sheet->setCellValue('A' . $sn, $item->num_row);
            $sheet->setCellValue('B' . $sn, $item->speciality);
            $sheet->setCellValue('C' . $sn, $item->ochnoe);
            $sheet->setCellValue('D' . $sn, $item->dot);
            $sheet->setCellValue('E' . $sn, $item->vse);
            $sheet->setCellValue('F' . $sn, $item->work_grant);
            $sheet->setCellValue('G' . $sn, $item->work_platn);
            $sheet->setCellValue('H' . $sn, $item->work_dot);
            $sheet->setCellValue('I' . $sn, $item->work_vse);
            $sheet->setCellValue('J' . $sn, $item->percent);
            $sheet->setCellValue('K' . $sn, $item->notwork_vse);
            $sn++;
        }

        foreach ($dataBachAll as $item) {
            $sheet->setCellValue('A17', $item->num_row);
            $sheet->setCellValue('B17', $item->speciality);
            $sheet->setCellValue('C17', $item->ochnoe);
            $sheet->setCellValue('D17', $item->dot);
            $sheet->setCellValue('E17', $item->vse);
            $sheet->setCellValue('F17', $item->work_grant);
            $sheet->setCellValue('G17', $item->work_platn);
            $sheet->setCellValue('H17', $item->work_dot);
            $sheet->setCellValue('I17', $item->work_vse);
            $sheet->setCellValue('J17', $item->percent);
            $sheet->setCellValue('K17', $item->notwork_vse);
        }

        $sn = 19;
        foreach ($dataMag as $item) {
            $sheet->setCellValue('A' . $sn, $item->num_row);
            $sheet->setCellValue('B' . $sn, $item->op_group);
            $sheet->setCellValue('C' . $sn, $item->ochnoe);
            $sheet->setCellValue('D' . $sn, $item->dot);
            $sheet->setCellValue('E' . $sn, $item->vse);
            $sheet->setCellValue('F' . $sn, $item->work_grant);
            $sheet->setCellValue('G' . $sn, $item->work_platn);
            $sheet->setCellValue('H' . $sn, $item->work_dot);
            $sheet->setCellValue('I' . $sn, $item->work_vse);
            $sheet->setCellValue('J' . $sn, $item->percent);
            $sheet->setCellValue('K' . $sn, $item->notwork_vse);
            $sn++;
        }

        foreach ($dataMagAll as $item) {
            $sheet->setCellValue('A22', $item->num_row);
            $sheet->setCellValue('B22', $item->op_group);
            $sheet->setCellValue('C22', $item->ochnoe);
            $sheet->setCellValue('D22', $item->dot);
            $sheet->setCellValue('E22', $item->vse);
            $sheet->setCellValue('F22', $item->work_grant);
            $sheet->setCellValue('G22', $item->work_platn);
            $sheet->setCellValue('H22', $item->work_dot);
            $sheet->setCellValue('I22', $item->work_vse);
            $sheet->setCellValue('J22', $item->percent);
            $sheet->setCellValue('K22', $item->notwork_vse);
        }

        foreach ($dataAll as $item) {
            $sheet->setCellValue('A23', $item->num_row);
            $sheet->setCellValue('B23', $item->op_group);
            $sheet->setCellValue('C23', $item->ochnoe);
            $sheet->setCellValue('D23', $item->dot);
            $sheet->setCellValue('E23', $item->vse);
            $sheet->setCellValue('F23', $item->work_grant);
            $sheet->setCellValue('G23', $item->work_platn);
            $sheet->setCellValue('H23', $item->work_dot);
            $sheet->setCellValue('I23', $item->work_vse);
            $sheet->setCellValue('J23', $item->percent);
            $sheet->setCellValue('K23', $item->notwork_vse);
        }

        $sheet = $spreadsheet->getActiveSheet()->getStyle('A1:K23')->getAlignment()->setWrapText(true)->setHorizontal('center');
        $sheet->getActiveSheet()->getColumnDimension('B')->setWidth(45);
        $sheet->getActiveSheet()->getStyle('A1:K23')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getActiveSheet()->getStyle('A1:K2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('4682b4');
        $sheet->getActiveSheet()->getStyle('A3:K3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('8fbc8f');
        $sheet->getActiveSheet()->getStyle('A4:K4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('add8e6');
        $sheet->getActiveSheet()->getStyle('A10:K10')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('add8e6');
        $sheet->getActiveSheet()->getStyle('A14:K14')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('add8e6');
        $sheet->getActiveSheet()->getStyle('A18:K18')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('4682b4');
        $sheet->getActiveSheet()->getStyle('A17:K17')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('afbbc4');
        $sheet->getActiveSheet()->getStyle('A22:K22')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('afbbc4');
        $sheet->getActiveSheet()->getStyle('A23:K23')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('60a689');



        $filename = 'Выпускники бакалавриат, магистратура 2022г.xlsx';
        // Redirect output to a client's web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }
}
