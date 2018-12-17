<div class="site-menubar">
    <div class="site-menubar-body">
      <div>
        <div>
          <ul class="site-menu">
            <?php if($_SESSION['accessType'] == "Admin"){ ?>
              <li class="site-menu-item has-sub">
                <a href="javascript:void(0)" data-slug="layout">
                  <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                  <span class="site-menu-title">Applicants</span>
                  <span class="site-menu-arrow"></span>
                </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="../Admin/applicantList.php" data-slug="Assign Access Type">
                    <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                    <span class="site-menu-title">Applicant Lists</span>
                  </a>
                </li>
                <li class="site-menu-item">
              <a class="animsition-link" href="../Admin/acceptedApplicant.php" data-slug="Assign Access Type">
                <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                <span class="site-menu-title">Approved Applicant</span>
              </a>
            </li>
              </ul>
            </li>
            <li class="site-menu-item has-sub">
                <a href="javascript:void(0)" data-slug="layout">
                  <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                  <span class="site-menu-title">Management</span>
                  <span class="site-menu-arrow"></span>
                </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="../Admin/addSubject.php" data-slug="Assign Access Type">
                    <i class="site-menu-icon wb-book" aria-hidden="true"></i>
                    <span class="site-menu-title">Subjects</span>
                  </a>
                </li>
              </ul>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="../Admin/users.php" data-slug="Assign Access Type">
                    <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                    <span class="site-menu-title">Users</span>
                  </a>
                </li>
              </ul>
              <!-- <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="../Admin/departments.php" data-slug="Assign Access Type">
                    <i class="site-menu-icon wb-home" aria-hidden="true"></i>
                    <span class="site-menu-title">Departments</span>
                  </a>
                </li>
              </ul> -->
            </li>
            <li class="site-menu-item">
              <a class="animsition-link" href="../Admin/assignAccessType.php" data-slug="Assign Access Type">
                <i class="site-menu-icon wb-user-add" aria-hidden="true"></i>
                <span class="site-menu-title">Assign Access Type</span>
              </a>
            </li>
            <li class="site-menu-item">
              <a class="animsition-link" href="../Admin/subjectSchedule.php" data-slug="Assign Access Type">
                <i class="site-menu-icon wb-time" aria-hidden="true"></i>
                <span class="site-menu-title">Subject Scheduling</span>
              </a>
            </li>
            <li class="site-menu-item">
              <a class="animsition-link" href="../Admin/settings.php" data-slug="settings">
                <i class="site-menu-icon wb-settings" aria-hidden="true"></i>
                <span class="site-menu-title">Settings</span>
              </a>
            </li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)" data-slug="layout">
                <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                <span class="site-menu-title">Reports</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="../Admin/exportRegListSex.php" data-slug="layout-grids">
                    <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                    <span class="site-menu-title">Registration List by Sex</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="../Admin/printClassList.php" data-slug="layout-grids">
                    <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                    <span class="site-menu-title">Class List</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="../Admin/exportListOfRegisteredCourses.php" data-slug="layout-grids">
                    <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                    <span class="site-menu-title">List of registered courses</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="../Admin/exportYearsOfResidency.php" data-slug="layout-grids">
                    <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                    <span class="site-menu-title">Years of Residency</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="../Admin/exportISOCompliance.php" data-slug="layout-grids">
                    <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                    <span class="site-menu-title">ISO Compliance</span>
                  </a>
                </li>
              </ul>
            </li>
            <?php }elseif($_SESSION['accessType'] == "Admission"){ ?>
            <li class="site-menu-item">
              <a class="animsition-link" href="../Admission/addAnApplicant.php" data-slug="Add an Applicant">
                <i class="site-menu-icon " aria-hidden="true"></i>
                <span class="site-menu-title">Add an Applicant</span>
              </a>
            </li>
            <li class="site-menu-item">
              <a class="animsition-link" href="../Admission/examResults.php" data-slug="Exam Results">
                <i class="site-menu-icon " aria-hidden="true"></i>
                <span class="site-menu-title">Exam Results</span>
              </a>
            </li>
            <li class="site-menu-item">
              <a class="animsition-link" href="../Admission/settings.php" data-slug="Settings">
                <i class="site-menu-icon " aria-hidden="true"></i>
                <span class="site-menu-title">Settings</span>
              </a>
            </li>
            <?php }elseif($_SESSION['accessType'] == "Registrar4new" || $_SESSION['accessType'] == "Registrar4old"){ ?>
            <li class="site-menu-item">
              <a class="animsition-link" href="../Registrar/submissionOfRequirements.php" data-slug="Submission of requirements">
                <i class="site-menu-icon " aria-hidden="true"></i>
                <span class="site-menu-title">Submission of Requirements</span>
              </a>
            </li> 
            <li class="site-menu-item">
              <a class="animsition-link" href="../Registrar/evaluationTransferee.php" data-slug="Evaluate Transferee">
                <i class="site-menu-icon " aria-hidden="false"></i>
                <span class="site-menu-title">Evaluate Transferee</span>
              </a>
            </li>
            <li class="site-menu-item">
              <a class="animsition-link" href="../Registrar/PrintingOfCoR.php" data-slug="Evaluate Transferee">
                <i class="site-menu-icon " aria-hidden="false"></i>
                <span class="site-menu-title">Printing of CoR</span>
              </a>
            </li>
            <li class="site-menu-item">
              <a class="animsition-link" href="../Registrar/submittedGrades.php" data-slug="Grades">
                <i class="site-menu-icon " aria-hidden="false"></i>
                <span class="site-menu-title">Grades</span>
              </a>
              <li class="site-menu-item">
              <a href="javascript:void(0)" class="animsition-link btnChangeOfGrade" data-slug="Change of Grade">
                <i class="site-menu-icon " aria-hidden="false"></i>
                <span class="site-menu-title">Change of Grade</span>
              </a>
            </li>

              <li class="site-menu-item">
              <a class="animsition-link" href="../Registrar/transferLoad.php" data-slug="Transfer Subject Load">
                <i class="site-menu-icon " aria-hidden="false"></i>
                <span class="site-menu-title">Transfer Subject Load</span>
              </a>
            </li>
            <?php }elseif($_SESSION['accessType'] == "VP for Acad"){ ?>
            <li class="site-menu-item">
              <a class="animsition-link" href="../VPforAcad/listOfApplicants.php" data-slug="Application Approval">
                <i class="site-menu-icon " aria-hidden="true"></i>
                <span class="site-menu-title">Application Approval</span>
              </a>
            </li>
           <li class="site-menu-item">
              <a class="animsition-link" href="../Registrar/preEnrollmentForm.php" data-slug="Evaluate Transferee">
                <i class="site-menu-icon " aria-hidden="false"></i>
                <span class="site-menu-title">Enrollment</span>
              </a>
            </li>
            <?php }elseif($_SESSION['accessType'] == "Guidance"){ ?>
            <li class="site-menu-item">
              <a class="animsition-link" href="../Guidance/Interview.php" data-slug="Application Approval">
                <i class="site-menu-icon " aria-hidden="true"></i>
                <span class="site-menu-title">Interview Results</span>
              </a>
            </li>
            <?php }elseif($_SESSION['accessType'] == "Student"){ ?>
            <li class="site-menu-item">
              <a class="animsition-link" href="../Student/studentEnrollment.php" data-slug="Evaluate Transferee">
                <i class="site-menu-icon " aria-hidden="false"></i>
                <span class="site-menu-title">Subject Enrollment</span>
              </a>
            </li>
            <li class="site-menu-item">
              <a class="animsition-link" href="../Student/subjectsTaken.php" data-slug="Subjects Taken">
                <i class="site-menu-icon " aria-hidden="false"></i>
                <span class="site-menu-title">Subjects Taken</span>
              </a>
            </li>

            <li class="site-menu-item">
              <a class="animsition-link" href="../Student/residency.php" data-slug="Residency">
                <i class="site-menu-icon " aria-hidden="false"></i>
                <span class="site-menu-title">Residency</span>
              </a>
            </li>
            <?php }elseif($_SESSION['accessType'] == "Applicant"){ ?>
            <li class="site-menu-item">
              <a class="animsition-link" href="../Applicant/preEnrollmentForm.php" data-slug="Pre-Enrollment">
                <i class="site-menu-icon " aria-hidden="true"></i>
                <span class="site-menu-title">Pre-Enrollment</span>
              </a>
            </li>
            <?php }elseif($_SESSION['accessType'] == "Faculty"){ ?>
            <li class="site-menu-item">
              <a class="animsition-link" href="../Faculty/encodeGrades.php" data-slug="Encode Grades">
                <i class="site-menu-icon " aria-hidden="false"></i>
                <span class="site-menu-title">Grades Encoding</span>
              </a>
            </li>
            <li class="site-menu-item">
              <a class="animsition-link" href="../Faculty/handledCourses.php" data-slug="Handled Courses">
                <i class="site-menu-icon " aria-hidden="false"></i>
                <span class="site-menu-title">Handled Courses</span>
              </a>
            </li>
             <?php }if($_SESSION['accessType'] == "Faculty" || $_SESSION['accessType'] == "VP for Acad"){ ?>
            <li class="site-menu-item">
              <a class="animsition-link" href="../Faculty/evaluatePEF.php" data-slug="Evaluate Transferee">
                <i class="site-menu-icon " aria-hidden="false"></i>
                <span class="site-menu-title">Evaluate PEF</span>
              </a>
            </li>
            <?php } ?>
            <!--
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)" data-slug="layout">
                <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                <span class="site-menu-title">Layouts</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="../layouts/grids.html" data-slug="layout-grids">
                    <i class="site-menu-icon " aria-hidden="true"></i>
                    <span class="site-menu-title">Grid Scaffolding</span>
                  </a>
                </li>
              </ul>
            </li>
            -->
          </ul>

        </div>
      </div>
    </div>

  </div>
