<table>
    <tbody>
        <?php foreach ($schedules as $day => $schedule) : ?>
            <tr>
                <td><?php echo ucfirst($day); ?></td>
                <td>
                    <select
                      id="<?php echo esc_attr( $args['label_for'] ); ?>-<?php echo $day; ?>-start"
                      name="schedule_demo_options[<?php echo esc_attr( $args['label_for'] ); ?>][<?php echo $day; ?>][start]"
                    >
                        <option value=""><?php _e( 'Select start', 'codesubmit-schedule-demo' ); ?></option>
                        <?php foreach ( $times as $time ) : ?>
                            <option
                              value="<?php echo $time; ?>"
                              <?php selected( $options[ $args['label_for'] ][$day]['start'], $time ); ?>
                            >
                                <?php echo $time; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select
                      id="<?php echo esc_attr( $args['label_for'] ); ?>-<?php echo $day; ?>-end"
                      name="schedule_demo_options[<?php echo esc_attr( $args['label_for'] ); ?>][<?php echo $day; ?>][end]"
                    >
                        <option value=""><?php _e( 'Select end', 'codesubmit-schedule-demo' ); ?></option>
                        <?php foreach ( $times as $time ) : ?>
                            <option
                              value="<?php echo $time; ?>"
                              <?php selected( $options[ $args['label_for'] ][$day]['end'], $time ); ?>
                            >
                                <?php echo $time; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>