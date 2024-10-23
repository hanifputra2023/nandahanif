<div class="h1">SOAL 3</div>
<br>
<br>

<form action="" method="post"class="">
              <div class="row">
                <div class="col">
                  <label for="">Masukan Nama</label>
                  <input type="text" name="nama" class="form-select mb-2">
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="">Masukan iq</label>
                  <input type="number" name="iq" class="form-select mb-2">
                </div>
              </div>
                <input type="submit" name="submit" class="btn btn-primary">
            </form>
            <?php
                if(isset($_POST['submit'])) {
                $iq = $_POST['iq'];
                $nama = $_POST['nama'];

                if ($iq > 144) {
                    $grade = "Very gifted or higly advenced";
                } 
                else if ($iq >=130 && $iq <=144){
                    $grade = "Gifted or Very advenced";
                }
                else if ($iq >=120 && $iq <=129){
                    $grade = "Supperior";
                }
                else if ($iq >=110 && $iq <=119){
                    $grade = "High Avarage";
                }
                else if ($iq >=90 && $iq <=109){
                    $grade = "Avarage";
                }
                else if ($iq >=80 && $iq <=89){
                    $grade = "Low Avarage";
                }
                else if ($iq >=70 && $iq <=79){
                    $grade = "Borderline impaired or delayed";
                }
                else if ($iq >=55 && $iq <=69){
                    $grade = "Midly impaired or delayed";
                }
                else if ($iq >=40 && $iq <=54){
                    $grade = "Moderetely impaired or delayed";
                }
                
                $teks = "$nama memiliki iq  $iq , $nama merupakan seorang yang $grade";
            ?>
            <div class="alert alert-primary alert-dismissible fade show mt-4" role="alert">
                <?=$teks?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php } ?>
