<?php

namespace App\Controllers;

use App\Models\AttendanceModel;
use App\Models\DutyModel;
use App\Models\PayrollModel;
use App\Models\UserModel;
use App\Models\EmployeeModel;
use App\Models\SppdModel;
use App\Models\UserActivityLogModel;

class Admin extends BaseController
{

    public function showUser()
    {
        $session = session();
        $username = $session->get('USERNAME');
        $users = new UserModel();
        $data = $users->where('USERNAME', $username)->first();
        $data['users'] = $users->getUsers();

        return view('admin/user_management', $data);
    }

    public function showEmployee()
    {
        $users = new UserModel();
        $employee = new EmployeeModel();

        $session = session();
        $username = $session->get('USERNAME');
        $data = $users->where('USERNAME', $username)->first();

        $data['result'] = $employee->getEmployee();
        return view('admin/employee', $data);
    }

    public function showPayroll()
    {
        $users = new UserModel();
        $payroll = new PayrollModel();

        $session = session();
        $username = $session->get('USERNAME');
        $data = $users->where('USERNAME', $username)->first();

        $data['result'] = $payroll->getPayroll();
        return view('admin/payroll', $data);
    }

    public function showSppd()
    {
        $users = new UserModel();
        $sppd = new SppdModel();

        $session = session();
        $username = $session->get('USERNAME');
        $data = $users->where('USERNAME', $username)->first();

        $data['result'] = $sppd->getSPPD();
        return view('admin/sppd', $data);
    }

    public function showAttendance()
    {
        $users = new UserModel();
        $attend = new AttendanceModel();

        $session = session();
        $username = $session->get('USERNAME');
        $data = $users->where('USERNAME', $username)->first();

        $data['result'] = $attend->getAttendance();
        return view('admin/attendance', $data);
    }

    public function showLog()
    {
        $users = new UserModel();
        $logs = new UserActivityLogModel();

        $session = session();
        $username = $session->get('USERNAME');
        $data = $users->where('USERNAME', $username)->first();

        $data['result'] = $logs->getLogs();
        return view('admin/activity_log', $data);
    }


    public function addUser()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'name'          => 'required|min_length[3]|max_length[20]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email',
            'password'      => 'required|min_length[6]|max_length[200]',
            'no_hp'         => 'required|max_length[30]|min_length[8]|numeric',
            'whatsapp'      => 'required|max_length[30]|min_length[8]|numeric',
            'pin'           => 'required|max_length[6]|min_length[6]|numeric',
            'username'      => 'required|max_length[60]',
            'status_user'   => 'required'
        ];

        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'NAMA_USER' => $this->request->getVar('name'),
                'USERNAME' => $this->request->getVar('username'),
                'EMAIL' => $this->request->getVar('email'),
                'PASSWORD' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'NO_HP' => $this->request->getVar('no_hp'),
                'WA' => $this->request->getVar('whatsapp'),
                'PIN' => $this->request->getVar('pin'),
                'STATUS_USER' => $this->request->getVar('status_user')

            ];
            $model->save($data);
            return redirect()->to(base_url('/user'));
        } else {
            $data['validation'] = $this->validator;
            return view('/user', $data);
        }
    }

    public function addEmployee()
    {
        $employee = new EmployeeModel();

        $employee->ignore(true)->insert([
            'ID_USER' => $this->request->getPost('id_user'),
            'ID_DUTY' => $this->request->getPost('id_duty')
        ]);
        return redirect()->to(base_url('/employee'));
    }

    public function addPayroll()
    {
        $payroll = new PayrollModel();
        $employee = new EmployeeModel();

        $id_employee = $this->request->getPost('id_employee');

        $salary = $employee->select('duty.SALARY')
            ->join('duty', 'duty.ID_DUTY=employee.ID_DUTY')
            ->where('ID_EMPLOYEE', $id_employee)
            ->get()->getresultArray();
        foreach ($salary as $row) {
            $number = $row['SALARY'];
        }

        $input_deduction = $this->request->getPost('salary_deduction');
        $total_salary = $number - intval($input_deduction);
        $data = ([
            'ID_EMPLOYEE' => $this->request->getPost('id_employee'),
            'SALARY' => $salary,
            'SALARY_DEDUCTION' => $input_deduction,
            'TOTAL_SALARY' => $total_salary
        ]);

        $payroll->insert($data);
        return redirect()->to(base_url('/payroll'));
    }

    public function addAttendance()
    {
        $attendance = new AttendanceModel();
        $attendance->insert([
            'ID_EMPLOYEE' => $this->request->getPost('id_employee'),
            'MONTH' => $this->request->getPost('month'),
            'YEAR' => $this->request->getPost('year'),
            'TOTAL_ATTENTION' => $this->request->getPost('total_attention'),
            'TOTAL_PERMISSION' => $this->request->getPost('total_permission')
        ]);
        return redirect()->to(base_url('/attendance'));
    }

    public function addSppd()
    {
        $sppd = new SppdModel();
        $sppd->insert([
            'ID_EMPLOYEE' => $this->request->getPost('id_employee'),
            'DESCRIPTION' => $this->request->getPost('description'),
            'DESTINATION' => $this->request->getPost('destination'),
            'DEPARTURE_DATE' => $this->request->getPost('departure'),
            'ARRIVE_DATE' => $this->request->getPost('arrive')
        ]);
        return redirect()->to(base_url('/sppd'));
    }

    //USER MNGMNT METHOD
    protected $users;
    public function deleteUser($ID_USER)
    {
        $this->users = new UserModel();
        $this->users->delete($ID_USER);
        return redirect()->to(base_url('/user'));
    }

    protected $employee;
    public function deleteEmployee($ID_EMPLOYEE)
    {
        $this->employee = new EmployeeModel();
        $this->employee->delete($ID_EMPLOYEE);
        return redirect()->to(base_url('/employee'));
    }

    protected $payroll;
    public function deletePayroll($ID_PAYROLL)
    {
        $this->payroll = new PayrollModel();
        $this->payroll->delete($ID_PAYROLL);
        return redirect()->to(base_url('/payroll'));
    }

    protected $sppd;
    public function deleteSppd($ID_SPPD)
    {
        $this->sppd = new SppdModel();
        $this->sppd->delete($ID_SPPD);
        return redirect()->to(base_url('/sppd'));
    }

    protected $attendance;
    public function deleteAttendance($ID_ATTENDANCE)
    {
        $this->attendance = new AttendanceModel();
        $this->attendance->delete($ID_ATTENDANCE);
        return redirect()->to(base_url('/attendance'));
    }

    public function editUser($id)
    {
        $session = session();
        $users = new UserModel();
        $data = $users->where('ID_USER', $id)->first();

        return view('admin/edit_user', $data);
    }

    public function saveUser($id)
    {
        $id_user = $id;
        $users = new UserModel();
        $data = $users->where('ID_USER', $id_user)->first();

        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'name'          => 'required|min_length[3]|max_length[20]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email',
            'no_hp'         => 'required|max_length[30]|min_length[8]|numeric',
            'whatsapp'      => 'required|max_length[30]|min_length[8]|numeric',
            'pin'           => 'required|max_length[6]|min_length[6]|numeric',
            'username'      => 'required|max_length[60]',
            'status_user'   => 'required|min_length[3]'
        ];

        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'NAMA_USER' => $this->request->getVar('name'),
                'USERNAME' => $this->request->getVar('username'),
                'EMAIL' => $this->request->getVar('email'),
                'NO_HP' => $this->request->getVar('no_hp'),
                'WA' => $this->request->getVar('whatsapp'),
                'PIN' => $this->request->getVar('pin'),
                'STATUS_USER' => $this->request->getVar('status_user')

            ];
            $model->update($id_user, $data);

            return redirect()->to(base_url('/user'));
        } else {
            $data['validation'] = $this->validator;
            return view('admin/edit_user', $data);
        }

        return view('admin/edit_user', $data);
    }

    public function editSppd($id)
    {
        $session = session();
        $sppd = new SppdModel();
        $data = $sppd->where('ID_SPPD', $id)->first();

        return view('admin/edit_sppd', $data);
    }

    public function saveSppd($id)
    {
        $sppd = new SppdModel();
        $data = ([
            'ID_EMPLOYEE' => $this->request->getPost('id_employee'),
            'DESCRIPTION' => $this->request->getPost('description'),
            'DESTINATION' => $this->request->getPost('destination'),
            'DEPARTURE_DATE' => $this->request->getPost('departure'),
            'ARRIVE_DATE' => $this->request->getPost('arrive')
        ]);

        $sppd->update($id, $data);
        return redirect()->to(base_url('/sppd'));
    }

    public function editPayroll($id)
    {
        $payroll = new PayrollModel();
        $data = $payroll->where('ID_PAYROLL', $id)->first();

        return view('admin/edit_payroll', $data);
    }

    public function savePayroll($id)
    {
        $payroll = new PayrollModel();
        $employee = new EmployeeModel();

        $id_employee = $this->request->getPost('id_employee');

        $salary = $employee->select('duty.SALARY')
            ->join('duty', 'duty.ID_DUTY=employee.ID_DUTY')
            ->where('ID_EMPLOYEE', $id_employee)
            ->get()->getresultArray();
        foreach ($salary as $row) {
            $number = $row['SALARY'];
        }

        $input_deduction = $this->request->getPost('salary_deduction');
        $total_salary = $number - intval($input_deduction);
        $data = ([
            'ID_EMPLOYEE' => $this->request->getPost('id_employee'),
            'SALARY' => $salary,
            'SALARY_DEDUCTION' => $input_deduction,
            'TOTAL_SALARY' => $total_salary
        ]);

        $payroll->update($id, $data);
        return redirect()->to(base_url('/payroll'));
    }

    public function editAttendance($id)
    {
        $attendance = new AttendanceModel();
        $data = $attendance->where('ID_ATTENDANCE', $id)->first();

        return view('admin/edit_attendance', $data);
    }

    public function saveAttendance($id)
    {
        $attendance = new AttendanceModel();
        $data = ([
            'ID_EMPLOYEE' => $this->request->getPost('id_employee'),
            'MONTH' => $this->request->getPost('month'),
            'YEAR' => $this->request->getPost('year'),
            'TOTAL_ATTENTION' => $this->request->getPost('total_attention'),
            'TOTAL_PERMISSION' => $this->request->getPost('total_permission')
        ]);

        $attendance->update($id, $data);
        return redirect()->to(base_url('/attendance'));
    }

    public function editEmployee($id)
    {
        $employee = new EmployeeModel();
        $data = $employee->where('ID_EMPLOYEE', $id)->first();

        return view('admin/edit_employee', $data);
    }

    public function saveEmployee($id)
    {
        $employee = new EmployeeModel();
        //$duty = new DutyModel();
        $data = $employee->where('ID_EMPLOYEE', $id)->first();

        $user = $employee->select('user.ID_USER')
            ->join('duty', 'duty.ID_DUTY=employee.ID_DUTY')
            ->join('user', 'user.ID_USER=employee.ID_USER')
            ->where('ID_EMPLOYEE', $id)
            ->get()->getresultArray();

        $data = ([
            'ID_USER' => $this->request->getVar('id_user'),
            'ID_DUTY' => $this->request->getVar('id_duty')
        ]);

        $employee->update($id, $data);
        return redirect()->to(base_url('/employee'));
    }
}
