<link rel="stylesheet" href="<?php echo base_url('assets/css/dashboard.css'); ?>">

<div class="container">
    <div class="mt-5 mb-5">
        <img src="<?=base_url('assets/img/profile/profile.jpg')?>" alt="profile" class="rounded-circle float-start me-3" width="80px">
            <h1 class="text-capitalize"><?= $_SESSION['username']?></h1>
            <p>Nek kulo mboten pripun pripun mboten mboten pripun</p>
    </div>

    <div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
        <nav>
          <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-my-vote-tab" data-bs-toggle="tab" data-bs-target="#nav-my-vote" type="button" role="tab" aria-controls="nav-my-vote" aria-selected="false">My Vote</button>
            <button class="nav-link" id="nav-history-tab" data-bs-toggle="tab" data-bs-target="#nav-history" type="button" role="tab" aria-controls="nav-history" aria-selected="false">History</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade show active" id="nav-my-vote" role="tabpanel" aria-labelledby="nav-my-vote-tab">
                <div class="bd-example-snippet bd-code-snippet"><div class="bd-example m-0 border-0">
                        <div class="accordion" id="accordionExample">
                            <?php $i = 0; foreach ($vote as $row) {?>
                            <div class="accordion-item">
                                <h4 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$i;?>" aria-expanded="false" aria-controls="collapse<?=$i;?>">
                                        <?=$row['vote_name'];?>
                                    </button>
                                </h4>

                                <div id="collapse<?=$i;?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="container mb-3">
                                            <div class="row align-items-start">
                                                <div class="col-2">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value ="<?=$row['voting_count']?> Responden" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="textToCopy<?=$i?>" value="<?=$row['share_code']?>" disabled>
                                                        <button class="btn btn-primary input-group-text" id="copyButton" onclick="copyToClipboard(<?=$i?>)" style="cursor: pointer;">Copy Code</button>
                                                    </div>
                                                </div>
                                                <ul class="nav col-8 justify-content-end">
                                                    <li class="nav-item"><a href="<?=site_url('vote/updateOption/'.$row['share_code'])?>"><img src="<?=base_url('assets/icons/pencil-square.svg')?>" alt="Bootstrap" width="24" height="24" style="cursor: pointer;"></a></li>
                                                    <li class="nav-item"><a href="<?=site_url('vote/deleteVote/'.$row['share_code'])?>"><img src="<?=base_url('assets/icons/trash-fill.svg')?>" alt="Bootstrap" width="24" height="24" style="cursor: pointer;"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <?php $j = 0; foreach(${'option'.$i} as $col) { ?>
                                            <div class="progress mb-1" role="progressbar" aria-label="Example with label" aria-valuenow="<?=${'voting_'.$row["share_code"].'_'.$j};?>" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar overflow-visible text-dark"style="width: <?=${'voting_'.$row["share_code"].'_'.$j};?>%">
                                                    <?php
                                                        echo $col['option'];
                                                        if($col['description'] != null){
                                                            echo ' ('.$col['description'].')';
                                                        }
                                                        echo ' - '.${'voting_'.$row["share_code"].'_'.$j}.'%';
                                                    ?>
                                                </div>
                                            </div>
                                        <?php $j++;} ?>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; } ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="nav-history" role="tabpanel" aria-labelledby="nav-history-tab">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Vote Name</th>
                        <th scope="col">Vote Owner</th>
                        <th scope="col">Your Choice</th>
                        <th scope="col">Choice Detail</th>
                        <th scope="col">Date</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($history_display as $row) {?>
                        <tr>
                            <th scope="row"><?=$i?></th>
                            <td><?=$row['vote_name']?></td>
                            <td><?=$row['user_name_vote']?></td>
                            <td><?=$row['option']?></td>
                            <td><?=$row['description']?></td>
                            <td><?=$row['datetime']?></td>
                            <td><a href="<?=site_url('vote/readVoteResult/'.$row['share_code_history'])?>" type="button" class="btn btn-primary btn-sm">Result</a></td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>

            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <p>Menu <strong>Kelola Profile</strong> sedang dalam pengembangan, staytune <a class="text-link-fairvote" href="https://github.com/frskynx">Github</a> untuk melihat perkembangannya ;)</p>
            </div>
        </div>
        </div></div>